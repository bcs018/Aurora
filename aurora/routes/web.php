<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeneravelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DescricaoController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\HomeController;

Route::middleware(RedirectIfAuthenticated::class)->group(function(){
    Route::resource('veneraveis', VeneravelController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('agendas', AgendaController::class);
    Route::resource('fotos', FotoController::class);
    Route::resource('/descricao', DescricaoController::class);
    Route::resource('historias', HistoriaController::class);
    Route::resource('documentos', DocumentoController::class);

    Route::get('home', [HomeController::class, 'index'])->name('home.index');
});

Route::get('login'  , [LoginController::class, 'index'])->name('login.login');
Route::post('logar' , [LoginController::class, 'store'])->name('login.logar');
Route::get('logout', [LoginController::class, 'destroy'])->name('login.logout');

Route::get('/', function () {
    return view('welcome');
});
