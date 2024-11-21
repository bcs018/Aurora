<?php

namespace App\Http\Controllers;

use App\Models\Descricao;
use App\Models\Documento;
use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexPage()
    {
        $descricao  = Descricao::find(1);
        $eventos    = Evento::orderBy('id', 'DESC')->limit(6)->get();
        $documentos = Documento::where('tipo', 'DOC')->get();

        if (!$descricao)
            $descricao = ' ';
        else 
            $descricao = $descricao->texto;

        return view('site.index', [
            'descricao'  => $descricao,
            'eventos'    => $eventos,
            'documentos' => $documentos
        ]);
    }
}
