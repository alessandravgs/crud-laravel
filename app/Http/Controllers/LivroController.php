<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LivroModel;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = LivroModel::all();
        return view('index', compact('livros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'autor' => 'required',
            'genero' => 'required',
        ]);
    
        LivroModel::create($request->all());
        return redirect()->route('livro.index')
                         ->with('Sucesso', 'Item criado com sucesso.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
        ]);
    
        $livro = LivroModel::findOrFail($id);
        $livro->nome = $request->input('nome');
        $livro->genero = $request->input('genero');
        $livro->autor = $request->input('autor');
        $livro->save();
    
        return redirect()->route('livro.index')->with('Sucesso', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = LivroModel::findOrFail($id);
        $livro->delete();

        return redirect()->route('livro.index')
                         ->with('Sucesso', 'Livro deletado com sucesso.');
    }
}
