<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt($request->only('sim', 'password')))
            return to_route('home.index');
        else 
            return to_route('login.login')->withErrors('Usuário e/ou senha inválidos')->withInput();
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login.login');
    }
}