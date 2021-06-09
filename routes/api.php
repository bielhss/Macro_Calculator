<?php

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Headers: origin, x-requested-with, content-type');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/usuario', function (Request $request) {
//     resturn $request->usuario();
// });

Route::prefix('usuario')->group(function()
{
    //Listar Usuário
    Route::get('/listar', 'Rest\UsuarioRestController@index')->name('usuario.listar');
    //Pesquisar Usuário
    // Route::any('/pesquisar', 'Rest\UsuarioRestController@search')->name('usuario.pesquisar');
    //Incluir Usuário
    // Route::get('/incluir', 'Rest\UsuarioRestController@new')->name('usuario.incluir');
    Route::post('/salvar', 'Rest\UsuarioRestController@create')->name('usuario.salvar');
    //Alterar Usuário
    Route::get('/alterar/{id}', 'Rest\UsuarioRestController@update')->name('usuario.update');
    Route::post('/update/{id}', 'Rest\UsuarioRestController@save')->name('usuario.atualizar');
    //Remover Usuário
    // Route::get('/deletar/{id}', 'Rest\UsuarioRestController@delete')->name('usuario.deletar');
    // Route::post('/excluir/{id}', 'Rest\UsuarioRestController@excluir')->name('usuario.excluir');
    //Consultar Usuário
    // Route::get('/consultar/{id}', 'Rest\UsuarioRestController@view')->name('usuario.consultar');
    //Cancelar Usuário
    // Route::get('/cancelar', 'Rest\UsuarioRestController@cancel')->name('usuario.cancelar');
});
