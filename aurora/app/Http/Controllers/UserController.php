<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();

        return view('painel.usuarios', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.createUsuarios');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // Verificando se já existe algum outro usuário com o mesmo email ou CIM
        $emailExists = User::where('email', $request->input('emailUsuario'))
        ->exists();

        $cimExists = User::where('cim', $request->input('cimUsuario'))
        ->exists();

        if ($emailExists) 
        {
            Alert::alert()->error('Atenção', 'O E-mail já está em uso por outro usuário.')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        if ($cimExists) 
        {
            Alert::alert()->error('Atenção', 'O CIM já está em uso por outro usuário.')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        $user = new User();
        $user->name = $request->input('nomeUsuario');
        $user->email = $request->input('emailUsuario');
        $user->cim = $request->input('cimUsuario');
        $user->administrador = (int)$request->input('administradorUsuario');
        $user->password = ' ';
        $user->save();

        Alert::alert()->success('Sucesso', 'Usuário cadastrado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('usuarios.create');
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
        $usuario = User::find($id);

        return view('painel.editUsuarios', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        // Verificando se já existe algum outro usuário com o mesmo email ou CIM
        $emailExists = User::where('email', $request->input('emailUsuario'))
        ->where('id', '!=', $id)
        ->exists();

        $cimExists = User::where('cim', $request->input('cimUsuario'))
        ->where('id', '!=', $id)
        ->exists();

        if ($emailExists) 
        {
            Alert::alert()->error('Atenção', 'O E-mail já está em uso por outro usuário.')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        if ($cimExists) 
        {
            Alert::alert()->error('Atenção', 'O CIM já está em uso por outro usuário.')
            ->autoclose(false)
            ->showConfirmButton('Ok', '#005284');

            return redirect()->back();
        }

        $user = User::find($id);
        $user->name = $request->input('nomeUsuario');
        $user->email = $request->input('emailUsuario');
        $user->cim = $request->input('cimUsuario');
        $user->administrador = (int)$request->input('administradorUsuario');
        $user->save();

        Alert::alert()->success('Sucesso', 'Usuario alterado com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return to_route('usuarios.edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::alert()->success('Sucesso', 'Usuario excluído com sucesso!')
        ->autoclose(false)
        ->showConfirmButton('Ok', '#005284');

        return redirect()->back();
    }
}
