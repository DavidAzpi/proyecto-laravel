<?php

namespace App\Http\Controllers;

use App\Models\Especificacion;
use Illuminate\Http\Request;

class EspecificacionController extends Controller
{
    /**
     * Vista pública de especificaciones
     */
    public function publicIndex()
    {
        $especificaciones = Especificacion::withCount('coches')->paginate(10);
        return view('especificaciones.index', compact('especificaciones'));
    }

    /**
     * Listado en panel admin
     */
    public function adminIndex()
    {
        $especificaciones = Especificacion::with(['coches.marca'])->orderBy('nombre')->paginate(10);
        return view('admin.especificaciones.index', compact('especificaciones'));
    }

    public function create()
    {
        return view('admin.especificaciones.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Especificacion::create($validated);

        return redirect()->route('admin.especificaciones.index')->with('success', 'Especificación creada correctamente.');
    }

    public function edit($id)
    {
        $especificacion = Especificacion::with(['coches.marca'])->findOrFail($id);
        return view('admin.especificaciones.edit', compact('especificacion'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $especificacion = Especificacion::findOrFail($id);
        $especificacion->update($validated);

        return redirect()->route('admin.especificaciones.index')->with('success', 'Especificación actualizada correctamente.');
    }

    public function delete($id)
    {
        $especificacion = Especificacion::findOrFail($id);
        $especificacion->delete();

        return redirect()->route('admin.especificaciones.index')->with('success', 'Especificación eliminada correctamente.');
    }
}
