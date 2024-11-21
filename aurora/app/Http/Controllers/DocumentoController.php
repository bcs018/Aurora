<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = Documento::where('tipo', 'DOC')->get();

        return view('painel.documentos', ['documentos' => $documentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createDocumentos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [ 
                'nomeDocumento' => 'required',
                'documentos'    => 'required'
            ],
            [ 
                'nomeDocumento.required' => 'O campo Nome do documento é obrigatório' ,
                'documentos.required' => 'O anexo do documento é obrigatório' 
            ]
        );

        $documento = new Documento();
        $documento->nome = $request->input('nomeDocumento');
        $documento->diretorio = $request->file('documentos')->store('documentos', 'public');
        $documento->tipo = 'DOC';
        $documento->save();

        Alert::alert()->success('Sucesso', 'Documento cadastrado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('documentos.create');
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
        $documento = Documento::find($id);

        return view('painel.editDocumentos', ['documento' => $documento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [ 'nomeDocumento'       => 'required' ],
            [ 'nomeDocumento.required' => 'O campo Nome do documento é obrigatório' ]
        );

        $documento = Documento::find($id);

        if($request->file('documentos') != null)
        {
            Storage::disk('public')->delete($documento->diretorio);

            $documento->diretorio = $request->file('documentos')->store('documentos', 'public');
        }

        $documento->nome = $request->input('nomeDocumento');

        $documento->save();

        Alert::alert()->success('Sucesso', 'Documento alterado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('documentos.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documento = Documento::find($id);

        Storage::disk('public')->delete($documento->diretorio);

        $documento->delete();

        Alert::alert()->success('Sucesso', 'Documento excluído com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return redirect()->back();
    }
}
