<?php

namespace App\Http\Controllers;

use App\Http\Requests\FotoRequest;
use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPage()
    {
        return view('site.fotos');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('painel.fotos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createFotos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FotoRequest $request)
    {
        $diretorio = '';

        /**
         * Salvar a foto aqui
         */

        $evento = new Evento();
        $evento->nome = $request->input('nomeEvento');
        $evento->descricao = $request->input('descricaoEvento');
        $evento->save();

        $foto = new Foto();
        $foto->nome = $request->input('nomeEvento');
        $foto->diretorio = $diretorio;
        $foto->evento_id = $evento->id;
        $foto->save();
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
