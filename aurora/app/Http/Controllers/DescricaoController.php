<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescricaoPagInicialRequest;
use App\Models\Descricao;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DescricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $texto = Descricao::find(1);

        if (!$texto)
            $texto = ' ';
        else 
            $texto = $texto->texto;

        return view('painel.createDescricaoPagInicial', ["texto"=>$texto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DescricaoPagInicialRequest $request)
    {
        $descricao = new Descricao();
        $descricao->truncate();

        $descricao->texto = $request->input('descricaoHistoria');
        $descricao->save();

        Alert::alert()->success('Sucesso', 'Descrição da página inicial cadastrada com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('descricao.create');
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
