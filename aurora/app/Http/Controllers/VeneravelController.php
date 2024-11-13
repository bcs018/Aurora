<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeneravelRequest;
use App\Models\Veneravel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
        $veneravel = Veneravel::find($id);

        return view('painel.editVeneravel', ['veneravel' => $veneravel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [ 
                'nomeVeneravel' => 'required',
                'periodoDe'     => 'required',
                'periodoAte'   => 'required' 
            ],
            [ 
                'nomeVeneravel.required' => 'O campo Nome é obrigatório',
                'periodoDe.required'     => 'O campo Período de é obrigatório', 
                'periodoAte.required'   => 'O campo Período até é obrigatório' 
            ]
        );

        $veneravel = Veneravel::find($id);

        if($request->file('fotoVeneravel') != null)
        {
            Storage::disk('public')->delete($veneravel->diretorio);

            $veneravel->diretorio = $request->file('fotoVeneravel')->store('veneraveis', 'public');
        }

        $veneravel->nome = $request->input('nomeVeneravel');
        $veneravel->ano_inicio = $request->input('periodoDe');
        $veneravel->ano_final = $request->input('periodoAte');

        $veneravel->save();

        Alert::alert()->success('Sucesso', 'Venerável alterado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('veneraveis.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $veneravel = Veneravel::find($id);

        Storage::disk('public')->delete($veneravel->diretorio);

        $veneravel->delete();

        Alert::alert()->success('Sucesso', 'Venerável excluído com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');


        return redirect()->back();
    }
}
