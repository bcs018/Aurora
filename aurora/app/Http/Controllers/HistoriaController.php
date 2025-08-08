<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescricaoPagHistoriaRequest;
use App\Models\Historia;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPage()
    {
        $historia = Historia::find(1);

        if (!$historia)
            $texto = ' ';
        else 
            $texto = $historia->conteudo;

        return view('site.historia', ['texto'=>$texto, 'historia'=>$historia]);
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
     * Salva somente o video
     */
    public function storeVideo(Request $request)
    {
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        // Processa as partes enviadas do video
        if ($receiver->isUploaded()) 
        {
            $save = $receiver->receive();

            if ($save->isFinished()) 
            {
                $video = $save->getFile();
                $videoPath = $video->store('video-historia', 'public');

                $historia = new Historia();

                $his = $historia->find(1);

                if ($his != null)
                {
                    Storage::disk('public')->delete($his->video_diretorio);
                    $his->video_diretorio = $videoPath;
                    $his->save();
                }
                else 
                {
                    $historia->video_diretorio = $videoPath;
                    $historia->ata_diretorio = ' ';
                    $historia->slide_diretorio = ' ';

                    $historia->conteudo = ' ';
                    $historia->save();
                }

                return response()->json([
                    'status' => 'success'
                ]);
            }

            return response()->json([
                "done" => $save->handler()->getPercentageDone(),
                "status" => true
            ]);
        }

        return response()->json(['error' => 'Arquivo não recebido.'], 400);
    }

    /**
     * Salva somente a ATA, PDF e Descrição historia
     * pois na pagina historia é separado o envio do 
     * video do envio dos arquivos, devido o video 
     * ser muito grande
     */
    public function store(DescricaoPagHistoriaRequest $request)
    {
        $historia = new Historia();

        $his = $historia->find(1);

        if ($his != null)
        {

            if ($request->file('slide') != null)
            {
                Storage::disk('public')->delete($his->slide_diretorio);
                $his->slide_diretorio = $request->file('slide')->store('slide', 'public');
            }

            if ($request->file('imgAta') != null)
            {
                Storage::disk('public')->delete($his->ata_diretorio);
                $his->ata_diretorio = $request->file('imgAta')->store('img-ata', 'public');
            }

            $his->conteudo = $request->input('descricaoHistoria');
            $his->save();
        }
        else 
        {
            if ($request->file('imgAta') != null)
                $historia->ata_diretorio = $request->file('imgAta')->store('img-ata', 'public');

            if ($request->file('slide') != null)
                $historia->slide_diretorio = $request->file('slide')->store('slide', 'public');

            $historia->conteudo = $request->input('descricaoHistoria');
            $historia->save();
        }

        return response()->json([
            'status' => 'success'
        ]);

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
