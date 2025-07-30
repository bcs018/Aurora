<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescricaoPagHistoriaRequest;
use App\Models\Historia;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPage()
    {
        $texto = Historia::find(1);

        if (!$texto)
            $texto = ' ';
        else 
            $texto = $texto->conteudo;

        return view('site.historia', ['texto'=>$texto]);
    }

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $texto = Historia::find(1);
        
        if (!$texto)
            $texto = ' ';
        else 
            $texto = $texto->conteudo;

        return view('painel.createDescricaoPagHistoria', ['texto'=>$texto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DescricaoPagHistoriaRequest $request)
    {
        $historia = new Historia();

        $his = $historia->find(1);

        if ($his != null)
        {
            $dirVideo = $his->video_diretorio;
            $dirSlide = $his->slide_diretorio;
            $dirAta = $his->Ata_diretorio;
    
            Storage::disk('public')->delete($dirVideo);
            Storage::disk('public')->delete($dirSlide);
            Storage::disk('public')->delete($dirAta);
        }
        
        $historia->truncate();

        // dd($request);

        if ($request->file('videoHistoria') != null)
            $historia->video_diretorio = $request->file('videoHistoria')->store('video-historia', 'public');

        if ($request->file('imgAta') != null)
            $historia->ata_diretorio = $request->file('imgAta')->store('img-ata', 'public');

        if ($request->file('slide') != null)
            $historia->slide_diretorio = $request->file('slide')->store('slide', 'public');

        $historia->conteudo = $request->input('descricaoHistoria');
        $historia->save();

        Alert::alert()->success('Sucesso', 'História cadastrada com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('historia.create');
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
