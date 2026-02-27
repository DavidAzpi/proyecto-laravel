<?php

namespace App\Http\Controllers;

use App\Models\Especificacion;
use Illuminate\Http\Request;

/**
 * Controlador para la gestión de especificaciones técnicas.
 * Entidad C en la relación N:N con Coche (Entidad B).
 */
class EspecificacionController extends Controller
{
    /**
     * Listado de especificaciones.
     */
    public function index()
    {
        $especificaciones = Especificacion::all();
        return view('especificaciones.index', [
            'especificaciones' => $especificaciones
        ]);
    }

    /**
     * Crear nueva especificación.
     */
    public function create()
    {
        return view('especificaciones.create');
    }

    /**
     * Guardar especificación.
     */
    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:especificaciones,nombre',
            'descripcion' => 'nullable|string'
        ]);

        $especificacion = new Especificacion();
        $especificacion->nombre = $request->input('nombre');
        $especificacion->descripcion = $request->input('descripcion');
        $especificacion->save();

        return redirect()->action([EspecificacionController::class, 'index'])
            ->with('success', 'Especificación añadida.');
    }

    /**
     * Editar especificación.
     */
    public function edit($id)
    {
        $especificacion = Especificacion::findOrFail($id);
        return view('especificaciones.edit', ['especificacion' => $especificacion]);
    }

    /**
     * Actualizar especificación.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $especificacion = Especificacion::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|unique:especificaciones,nombre,' . $id,
            'descripcion' => 'nullable|string'
        ]);

        $especificacion->nombre = $request->input('nombre');
        $especificacion->descripcion = $request->input('descripcion');
        $especificacion->save();

        return redirect()->action([EspecificacionController::class, 'index'])
            ->with('success', 'Especificación actualizada.');
    }

    /**
     * Borrar especificación.
     */
    public function delete($id)
    {
        $especificacion = Especificacion::findOrFail($id);
        $especificacion->delete();

        return redirect()->action([EspecificacionController::class, 'index'])
            ->with('success', 'Especificación eliminada.');
    }
}
