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
        $agendas = Agenda::where('data', '>=', date('Y-m-d'))->orderBy('data')->get();

        return view('site.agenda', ['agendas' => $agendas]);
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
        $agenda = Agenda::find($id);

        if (!$agenda)
        {
            Alert::alert()->error('Atenção', 'Agenda não encontrada!')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        return view('painel.editAgenda', ['agenda' => $agenda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgendaRequest $request, string $id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda)
        {
            Alert::alert()->error('Atenção', 'Agenda não encontrada!')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        $agenda->descricao = $request->input('descricaoAgenda');
        $agenda->data = $request->input('dataAgenda');
        $agenda->save();

        Alert::alert()->success('Sucesso', 'Agenda alterada com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        Alert::alert()->success('Sucesso', 'Agenda excluída com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('agenda.index');
    }
}
