<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para la gestion de marcas fabricantes.
 */
class MarcaController extends Controller
{
    /**
     * Listado de marcas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $marcas = Marca::withCount('coches')->orderBy('nombre', 'asc')->paginate(6);

        return view('marcas.index', [
            'marcas' => $marcas
        ]);
    }

    /**
     * Formulario de creacion.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Guardar nueva marca en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:marcas,nombre',
            'pais' => 'required|string',
            'logo' => 'nullable|image'
        ]);

        $marca = new Marca();
        $marca->nombre = $request->input('nombre');
        $marca->pais = $request->input('pais');

        if ($request->hasFile('logo')) {
            $ruta = $request->file('logo')->store('marcas', 'public');
            $marca->logo = $ruta;
        }

        $marca->save();

        return redirect()->action([MarcaController::class, 'index'])
            ->with('success', 'Marca creada correctamente.');
    }

    /**
     * Muestra el formulario de edicion de una marca.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marcas.edit', ['marca' => $marca]);
    }

    /**
     * Actualizar los datos de una marca en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $marca = Marca::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|unique:marcas,nombre,' . $id,
            'pais' => 'required|string',
            'logo' => 'nullable|image'
        ]);

        $marca->nombre = $request->input('nombre');
        $marca->pais = $request->input('pais');

        if ($request->hasFile('logo')) {
            if ($marca->logo) {
                Storage::disk('public')->delete($marca->logo);
            }
            $ruta = $request->file('logo')->store('marcas', 'public');
            $marca->logo = $ruta;
        }

        $marca->save();

        return redirect()->action([MarcaController::class, 'index'])
            ->with('success', 'Marca actualizada correctamente.');
    }

    /**
     * Borrar marca de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);

        // Borrar logo
        if ($marca->logo) {
            Storage::disk('public')->delete($marca->logo);
        }

        $marca->delete();

        return redirect()->action([MarcaController::class, 'index'])
            ->with('success', 'Marca eliminada.');
    }
}
