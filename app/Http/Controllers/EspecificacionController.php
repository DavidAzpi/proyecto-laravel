<?php

namespace App\Http\Controllers;

use App\Models\Especificacion;
use Illuminate\Http\Request;

/**
 * Controlador para la gestion de especificaciones tecnicas.
 * Entidad C en la relacion N:N con Coche (Entidad B).
 */
class EspecificacionController extends Controller
{
    /**
     * Listado de todas las especificaciones registradas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $especificaciones = Especificacion::paginate(6);
        return view('especificaciones.index', [
            'especificaciones' => $especificaciones
        ]);
    }

    /**
     * Muestra el formulario para crear una nueva especificacion.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('especificaciones.create');
    }

    /**
     * Guarda una nueva especificacion en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:especificaciones,nombre',
            'descripcion' => 'nullable|string'
        ]);

        $especificacion = new Especificacion();
        $especificacion->nombre = $request->input('nombre');
        $especificacion->descripcion = $request->input('descripcion');
        $especificacion->save();

        return redirect()->route('especificaciones.index')
            ->with('success', 'Especificación añadida.');
    }

    /**
     * Muestra el formulario de edicion de una especificacion.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $especificacion = Especificacion::findOrFail($id);
        return view('especificaciones.edit', ['especificacion' => $especificacion]);
    }

    /**
     * Actualiza los datos de una especificacion en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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

        return redirect()->route('especificaciones.index')
            ->with('success', 'Especificación actualizada.');
    }

    /**
     * Elimina una especificacion de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $especificacion = Especificacion::findOrFail($id);
        $especificacion->delete();

        return redirect()->route('especificaciones.index')
            ->with('success', 'Especificación eliminada.');
    }
}
