<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Marca;
use App\Models\Especificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CocheController extends Controller
{
    /**
     * Showroom público — vista principal
     */
    public function index(Request $request)
    {
        $coches = Coche::with('marca');

        if ($request->has('buscar')) {
            $coches = $coches->where('modelo', 'LIKE', '%' . $request->buscar . '%');
        }

       
        $coches = $coches->paginate(9);
        return view('coches.index', compact('coches'));
    }

    /**
     * Listado en panel admin
     */
    public function adminIndex()
    {
        $coches = Coche::with(['marca', 'especificaciones'])->latest()->paginate(10);
        return view('admin.coches.index', compact('coches'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $especificaciones = Especificacion::all();
        return view('admin.coches.create', compact('marcas', 'especificaciones'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'modelo'           => 'required|string|max:255',
            'precio'           => 'required|numeric',
            'imagen'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marca_id'         => 'required|exists:marcas,id',
            'especificaciones' => 'nullable|array',
            'especificaciones.*' => 'exists:especificacions,id',
        ]);

        $data = $request->except('especificaciones');

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('coches', 'public');
            $data['imagen'] = $path;
        }

        $coche = Coche::create($data);

        if ($request->has('especificaciones')) {
            $coche->especificaciones()->attach($request->especificaciones);
        }

        return redirect()->route('admin.coches.index')->with('success', 'Vehículo registrado correctamente.');
    }

    public function edit($id)
    {
        $coche = Coche::with('especificaciones')->findOrFail($id);
        $marcas = Marca::all();
        $especificaciones = Especificacion::all();
        return view('admin.coches.edit', compact('coche', 'marcas', 'especificaciones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'modelo'           => 'required|string|max:255',
            'precio'           => 'required|numeric',
            'imagen'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marca_id'         => 'required|exists:marcas,id',
            'especificaciones' => 'nullable|array',
            'especificaciones.*' => 'exists:especificacions,id',
        ]);

        $coche = Coche::findOrFail($id);
        $data  = $request->except('especificaciones');

        if ($request->hasFile('imagen')) {
            if ($coche->imagen) {
                Storage::disk('public')->delete($coche->imagen);
            }
            $path = $request->file('imagen')->store('coches', 'public');
            $data['imagen'] = $path;
        }

        $coche->update($data);
        $coche->especificaciones()->sync($request->especificaciones ?? []);

        return redirect()->route('admin.coches.index')->with('success', 'Vehículo actualizado correctamente.');
    }

    public function delete($id)
    {
        $coche = Coche::findOrFail($id);

        if ($coche->imagen) {
            Storage::disk('public')->delete($coche->imagen);
        }

        $coche->delete();

        return redirect()->route('admin.coches.index')->with('success', 'Vehículo eliminado correctamente.');
    }

    public function show($id)
    {
        $coche = Coche::with(['marca', 'especificaciones'])->findOrFail($id);
        return view('coches.show', compact('coche'));
    }
}
