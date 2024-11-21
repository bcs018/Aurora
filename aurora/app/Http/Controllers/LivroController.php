<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use RealRashid\SweetAlert\Facades\Alert;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Documento::where('tipo', 'LIV')->get();

        return view('painel.livros', ['livros' => $livros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createLivros');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [ 
                'nomeLivro' => 'required',
                'livros'    => 'required'
            ],
            [ 
                'nomeLivro.required' => 'O campo Nome do livro é obrigatório' ,
                'livros.required'    => 'O anexo do livro é obrigatório' 
            ]
        );

        $documento = new Documento();
        $documento->nome = $request->input('nomeLivro');
        $documento->diretorio = $request->file('livros')->store('livros', 'public');
        $documento->tipo = 'LIV';
        $documento->save();

        Alert::alert()->success('Sucesso', 'Livro cadastrado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('livros.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
