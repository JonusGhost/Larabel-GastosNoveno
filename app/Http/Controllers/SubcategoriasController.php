<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subcategoria;

class SubcategoriasController extends Controller
{
    public function index() {
        return Subcategoria::all();
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'id_categoria' => 'required|exists:categorias,id',
            'categoria' => 'required|string|exists:categorias,nombre'
        ]);

        $Subcategoria = Subcategoria::create($validated);
        return response()->json($Subcategoria, 201);
    }

    public function show($id) {
        $Subcategoria = Subcategoria::findOrFail($id);
        return $Subcategoria;
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'id_categoria' => 'required|exists:categorias,id',
            'categoria' => 'required|string|exists:categorias,nombre'
        ]);

        $Subcategoria = Subcategoria::findOrFail($id);
        $Subcategoria->update($validated);

        return response()->json($Subcategoria, 200);
    }

    public function destroy($id) {
        $Subcategoria = Subcategoria::findOrFail($id);
        $Subcategoria->delete();

        return response()->json(null, 204);
    }
}
