<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('painel.documentos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createDocumentos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documento = new Documento();
        $documento->nome = $request->input('nomeDocumento');
        $documento->diretorio = $request->file('documentos')->store('documentos', 'public');
        $documento->save();

        Alert::alert()->success('Sucesso', 'Documento cadastrada com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('documentos.create');
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
