<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    /**
     * Vista pública de marcas
     */
    public function publicIndex()
    {
        $marcas = Marca::withCount('coches')->paginate(12);
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Listado en panel admin
     */
    public function adminIndex()
    {
        $marcas = Marca::withCount('coches')->orderBy('nombre')->paginate(10);
        return view('admin.marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('admin.marcas.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pais'   => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('marcas', 'public');
            $data['logo'] = $path;
        }

        Marca::create($data);

        return redirect()->route('admin.marcas.index')->with('success', 'Marca creada correctamente.');
    }

    public function edit($id)
    {
        $marca = Marca::with('coches')->findOrFail($id);
        return view('admin.marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pais'   => 'nullable|string|max:255',
        ]);

        $marca = Marca::findOrFail($id);
        $data  = $request->all();

        if ($request->hasFile('logo')) {
            if ($marca->logo) {
                Storage::disk('public')->delete($marca->logo);
            }
            $path = $request->file('logo')->store('marcas', 'public');
            $data['logo'] = $path;
        }

        $marca->update($data);

        return redirect()->route('admin.marcas.index')->with('success', 'Marca actualizada correctamente.');
    }

    public function delete($id)
    {
        $marca = Marca::findOrFail($id);

        if ($marca->logo) {
            Storage::disk('public')->delete($marca->logo);
        }

        $marca->delete();

        return redirect()->route('admin.marcas.index')->with('success', 'Marca eliminada correctamente.');
    }
}
