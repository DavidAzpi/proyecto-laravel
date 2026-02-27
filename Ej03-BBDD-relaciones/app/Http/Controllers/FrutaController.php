<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruta;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller
{

    public function index()
    {
        $frutas = DB::table('frutas')
            ->orderBy('id', 'desc')
            ->get();

        return view('fruta.index', [
            'frutas' => $frutas
        ]);
    }

    public function detail($id)
    {
        $fruta = DB::table('frutas')
            ->where('id', '=', $id)
            ->first();

        return view('fruta.detail', [
            'fruta' => $fruta
        ]);
    }
    public function create()
    {
        $categorias = Categoria::all();

        return view('fruta.create', compact('categorias'));
    }


    public function save(Request $request)
    {
        Fruta::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'fecha' => date('Y-m-d'),
            'categoria_id' => $request->input('categoria_id')
        ]);

        return redirect()->action([FrutaController::class, 'index']);
    }

    public function delete($id)
    {
        DB::table('frutas')
            ->where('id', '=', $id)
            ->delete();
        return redirect()
            ->action([FrutaController::class, 'index'])
            ->with('status', 'Fruta borrada correctamente');
    }
    public function edit($id)
    {
        $fruta = DB::table('frutas')
            ->where('id', '=', $id)
            ->first();

        $categorias = Categoria::all();

        return view('fruta.create', [
            'fruta' => $fruta,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request)
    {
        DB::table('frutas')
            ->where('id', '=', $request->input('id'))
            ->update([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'precio' => $request->input('precio'),
                'categoria_id' => $request->input('categoria_id')
        ]);

        return redirect()
            ->action([FrutaController::class, 'index'])
            ->with('status', 'Fruta actualizada correctamente');
    }


}
