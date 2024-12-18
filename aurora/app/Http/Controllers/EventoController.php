<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventoRequest;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function store(EventoRequest $request)
    {
        $evento = new Evento();
        $evento->nome = $request->input('nomeEvento');
        $evento->descricao = $request->input('descricaoEvento');
        $evento->capa = ' ';
        $evento->save();

        return response()->json(['message' => '', 'evento_id' => $evento->id], 200); 
    }

    public function update(Request $request, string $id)
    {
        $evento = Evento::find($id);
        $evento->nome = $request->input('nomeEvento');
        $evento->descricao = $request->input('descricaoEvento');
        $evento->save();

        return response()->json(['message' => '', 'evento_id' => $evento->id], 200); 
    }

}
