<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Marca;
use App\Models\Especificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para la gestión de vehículos.
 */
class CocheController extends Controller
{
    /**
     * Muestra el listado de todos los coches con paginación.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        // Cargamos relaciones y aplicamos filtro si existe búsqueda
        $coches = Coche::with('marca', 'especificaciones')
            ->when($buscar, function ($query, $buscar) {
                return $query->where('modelo', 'LIKE', "%{$buscar}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('coches.index', [
            'coches' => $coches
        ]);
    }

    public function show($id)
    {
        $coche = Coche::with('marca', 'especificaciones')->findOrFail($id);
        return view('coches.show', compact('coche'));
    }

    /**
     * Muestra el formulario de simulación de compra.
     */
    public function compra($id)
    {
        $coche = Coche::with('marca')->findOrFail($id);
        return view('coches.checkout', compact('coche'));
    }

    /**
     * Procesa la simulación de compra.
     */
    public function procesarCompra(Request $request)
    {
        $request->validate([
            'coche_id' => 'required|exists:coches,id',
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'metodo_pago' => 'required'
        ]);

        $coche = Coche::findOrFail($request->coche_id);
        $referencia = 'PHANTOM-' . strtoupper(substr(md5(time() . $request->email), 0, 8));

        // Persistimos el pedido en la base de datos
        \App\Models\Pedido::create([
            'coche_id' => $coche->id,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'metodo_pago' => $request->metodo_pago,
            'referencia' => $referencia,
            'total' => $coche->precio
        ]);
        
        return view('coches.checkout_confirm', [
            'coche' => $coche,
            'cliente' => $request->only(['nombre', 'email']),
            'referencia' => $referencia
        ]);
    }

    /**
     * Muestra el formulario para añadir un nuevo coche.
     */
    public function create()
    {
        $marcas = Marca::all();
        $especificaciones = Especificacion::all();

        return view('coches.create', [
            'marcas' => $marcas,
            'especificaciones' => $especificaciones
        ]);
    }

    /**
     * Guarda un nuevo coche en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de datos con mensajes personalizados (Mejora personal 1)
        $request->validate([
            'modelo' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'marca_id' => 'required|exists:marcas,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'modelo.required' => 'El nombre del modelo es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'marca_id.required' => 'Debes seleccionar una marca fabricante.'
        ]);

        $coche = new Coche();
        $coche->modelo = $request->input('modelo');
        $coche->precio = $request->input('precio');
        $coche->marca_id = $request->input('marca_id');

        // Gestión del archivo de imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $ruta = $request->file('imagen')->storeAs('coches', $nombreImagen, 'public');
            $coche->imagen = $ruta;
        }

        $coche->save();

        // Guardar relaciones N:N con pivot (Mejora personal 2: Uso de sync)
        if ($request->has('especificaciones')) {
            $datosPivot = [];
            foreach ($request->input('especificaciones') as $idEspecificacion) {
                $valor = $request->input('valores_especificacion')[$idEspecificacion] ?? '';
                $datosPivot[$idEspecificacion] = ['valor' => $valor];
            }
            $coche->especificaciones()->sync($datosPivot);
        }

        return redirect()->route('coches.index')
            ->with('success', 'Vehículo añadido correctamente al inventario.');
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit($id)
    {
        $coche = Coche::findOrFail($id);
        $marcas = Marca::all();
        $especificaciones = Especificacion::all();

        return view('coches.edit', [
            'coche' => $coche,
            'marcas' => $marcas,
            'especificaciones' => $especificaciones
        ]);
    }

    /**
     * Actualiza los datos de un coche existente.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $coche = Coche::findOrFail($id);

        $request->validate([
            'modelo' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'marca_id' => 'required|exists:marcas,id',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $coche->modelo = $request->input('modelo');
        $coche->precio = $request->input('precio');
        $coche->marca_id = $request->input('marca_id');

        if ($request->hasFile('imagen')) {
            // Borrar imagen antigua si existe
            if ($coche->imagen && Storage::disk('public')->exists($coche->imagen)) {
                Storage::disk('public')->delete($coche->imagen);
            }
            $nombreImagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $ruta = $request->file('imagen')->storeAs('coches', $nombreImagen, 'public');
            $coche->imagen = $ruta;
        }

        $coche->save();

        // Actualizar relaciones N:N
        if ($request->has('especificaciones')) {
            $datosPivot = [];
            foreach ($request->input('especificaciones') as $idEspecificacion) {
                $valor = $request->input('valores_especificacion')[$idEspecificacion] ?? '';
                $datosPivot[$idEspecificacion] = ['valor' => $valor];
            }
            $coche->especificaciones()->sync($datosPivot);
        }

        return redirect()->route('coches.index')
            ->with('success', 'Vehículo actualizado satisfactoriamente.');
    }

    /**
     * Elimina un coche de la base de datos.
     */
    public function destroy($id)
    {
        $coche = Coche::findOrFail($id);

        // Eliminar fichero de imagen asociado
        if ($coche->imagen && Storage::disk('public')->exists($coche->imagen)) {
            Storage::disk('public')->delete($coche->imagen);
        }

        $coche->delete();

        return redirect()->route('coches.index')
            ->with('success', 'Vehículo eliminado del sistema.');
    }
}
