<?php

namespace App\Http\Controllers;

use App\Http\Requests\FotoRequest;
use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPage()
    {
        $eventos = Evento::orderBy('id', 'DESC')->get();

        return view('site.fotos', ['eventos' => $eventos]);
    }

    public function listaFotos(string $id)
    {
        $fotos = Foto::with('evento')->where('evento_id', $id)->get();

        return view('site.listaFotos', ['fotos' => $fotos]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();

        return view('painel.fotos', ['eventos'=>$eventos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createFotos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FotoRequest $request)
    {
        /**
         * Salvar a foto aqui
         */
        if($request->file('fotos') != null)
        {
            foreach($request->file('fotos') as $arquivo)
            {
                // $diretorio = $request->file('fotos')->store('fotos', 'public');
                $diretorio = $arquivo->store('fotos', 'public');

                $foto = new Foto();
                $foto->nome = $request->input('nomeEvento');
                $foto->diretorio = $diretorio;
                $foto->evento_id = $request->input('evento_id');
                $foto->save();
            }
        }

        $evento = Evento::find($request->input('evento_id'));

        if ($evento->capa == ' ')
        {
            $evento->capa = $diretorio;
            $evento->save();
        }

        return response()->json(['message' => '', 'evento_id' => $evento->id], 200); 
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
        $foto = Foto::with('evento')->where('evento_id', $id)->get();
        
        if (!$foto)
        {
            Alert::alert()->error('Atenção', 'Foto não encontrada!')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        return view('painel.editFotos', ['foto' => $foto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFoto(Request $request, string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        if($request->file('fotos') != null)
        {
            foreach($request->file('fotos') as $arquivo)
            {
                $foto = new Foto();
                $foto->nome = $request->input('nomeEvento');
                $foto->diretorio = $arquivo->store('fotos', 'public');
                $foto->evento_id = $request->input('evento_id');
                $foto->save();
            }   
        }

        return response()->json(['message' => '', 'evento_id' => $request->input('evento_id')], 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fotos = Foto::where('evento_id', $id)->get();

        foreach ($fotos as $foto)
            Storage::disk('public')->delete($foto->diretorio);

        $evento = Evento::find($id);
        $evento->delete();

        Alert::alert()->success('Sucesso', 'Evento excluído com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return redirect()->back();
    }

    public function destroyFoto(string $id)
    {
        $foto = Foto::find($id);
        
        Storage::disk('public')->delete($foto->diretorio);

        $foto->delete();
        
        Alert::alert()->success('Sucesso', 'Fotos excluída com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return redirect()->back();
    }
}
