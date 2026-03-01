<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para la gestión de marcas fabricantes.
 */
class MarcaController extends Controller
{
    /**
     * Listado de marcas.
     */
    public function index()
    {
        $marcas = Marca::withCount('coches')->orderBy('nombre', 'asc')->paginate(6);

        return view('marcas.index', [
            'marcas' => $marcas
        ]);
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Guardar nueva marca.
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
     * Editar marca.
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marcas.edit', ['marca' => $marca]);
    }

    /**
     * Actualizar marca.
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
     * Borrar marca.
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
