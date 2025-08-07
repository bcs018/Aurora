<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeneravelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DescricaoController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivroController;
use App\Http\Middleware\RedirectIdNotAdmin;

Route::middleware(RedirectIfAuthenticated::class)->group(function(){
    Route::get('veneraveis'        , [VeneravelController::class, 'indexPage'])->name('veneraveis.indexPage');
    Route::get('agenda'            , [AgendaController::class   , 'indexPage'])->name('agenda.indexPage');
    Route::get('fotos'             , [FotoController::class     , 'indexPage'])->name('fotos.indexPage');
    Route::get('evento/{id}/fotos' , [FotoController::class     , 'listaFotos'])->name('fotos.listaFotos');
    Route::get('historia'          , [HistoriaController::class , 'indexPage'])->name('historia.indexPage');
    Route::get('documentos'        , [DocumentoController::class, 'listaDocumentos'])->name('documento.listaDocumentos');
    Route::get('livros'            , [DocumentoController::class, 'listaLivros'])->name('documento.listaLivros');
    Route::get('/'                 , [HomeController::class     , 'indexPage'])->name('home.indexPage');

    Route::prefix('painel')->middleware(RedirectIdNotAdmin::class)->group(function(){
        Route::get('/', function(){
            return view('painel.index');
        })->name('painel.index');

        Route::resource('veneraveis', VeneravelController::class);
        Route::resource('usuarios'  , UserController::class);
        Route::resource('agenda'    , AgendaController::class);
        Route::resource('fotos'     , FotoController::class);
        Route::resource('descricao' , DescricaoController::class);
        Route::resource('historia'  , HistoriaController::class);
        Route::resource('documentos', DocumentoController::class);
        Route::resource('livros'    , LivroController::class);
        Route::resource('eventos'   , EventoController::class);

        Route::post('store-video', [HistoriaController::class, 'storeVideo'])->name('historia.saveVideo');
        
        Route::delete('excluir-foto/{id}', [FotoController::class, 'destroyFoto'])->name('fotos.destroyFoto');
    });

});

Route::get('login'                 , [LoginController::class, 'index'])->name('login.login');
Route::post('logar'                , [LoginController::class, 'store'])->name('login.logar');
Route::get('logout'                , [LoginController::class, 'destroy'])->name('login.logout');
Route::get('solicitar-troca-senha' , [LoginController::class, 'solicitarTrocarSenha'])->name('login.solicitarTrocaSenhaView');
Route::get('nova-senha/{token}'    , [LoginController::class, 'novaSenha'])->name('login.novaSenha');
Route::post('solicitar-troca-senha', [LoginController::class, 'solicitarTrocaSenha'])->name('login.solicitarTrocaSenhaPost');
Route::post('trocar-senha/{token}' , [LoginController::class, 'trocarSenha'])->name('login.trocarSenha');

Route::get('time', function(){
    // date_default_timezone_set('America/Sao_Paulo');
    echo date_default_timezone_get();
});