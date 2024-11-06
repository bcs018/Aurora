<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeneravelRequest;
use App\Models\Veneravel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VeneravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPage()
    {
        return view('site.veneravel');
    }

    public function index()
    {
        $veneraveis = Veneravel::all();

        return view('painel.veneravel', ['veneraveis' => $veneraveis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createVeneravel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VeneravelRequest $request)
    {
        $veneravel = new Veneravel();
        $veneravel->nome = $request->input('nomeVeneravel');
        $veneravel->ano_inicio = $request->input('periodoDe');
        $veneravel->ano_final = $request->input('periodoAte');
        $veneravel->diretorio = $request->file('fotoVeneravel')->store('veneraveis', 'public');
        $veneravel->save();

        Alert::alert()->success('Sucesso', 'Venerável cadastrado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('veneraveis.create');
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
