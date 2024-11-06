<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPage()
    {
        return view('site.agenda');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::all();

        return view('painel.agenda', ['agendas' => $agendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createAgenda');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgendaRequest $request)
    {
        $agenda = new Agenda();
        $agenda->descricao = $request->input('descricaoAgenda');
        $agenda->data = $request->input('dataAgenda');
        $agenda->save();

        Alert::alert()->success('Sucesso', 'Agenda cadastrada com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('agenda.create');
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
