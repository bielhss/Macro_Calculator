<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::prefix('usuario')->group(function () {
    //Listar Usuário
    Route::get('/listar', 'UsuarioController@index')->name('usuario.listar');
    //Pesquisar Usuário
    Route::any('/pesquisar', 'UsuarioController@search')->name('usuario.pesquisar');
    //Incluir Usuário
    Route::get('/incluir', 'UsuarioController@new')->name('usuario.incluir');
    Route::post('/salvar', 'UsuarioController@create')->name('usuario.salvar');
    //Alterar Usuário
    Route::get('/alterar/{id}', 'UsuarioController@update')->name('usuario.update');
    Route::post('/update/{id}', 'UsuarioController@save')->name('usuario.atualizar');
    //Remover Usuário
    Route::get('/deletar/{id}', 'UsuarioController@delete')->name('usuario.deletar');
    Route::post('/excluir/{id}', 'UsuarioController@excluir')->name('usuario.excluir');
    //Consultar Usuário
    Route::get('/consultar/{id}', 'UsuarioController@view')->name('usuario.consultar');
    //Cancelar Usuário
    Route::get('/cancelar', 'UsuarioController@cancel')->name('usuario.cancelar');
});

Route::prefix('alimento')->group(function () {
    //Listar alimento
    Route::get('/listar', 'AlimentoController@index')->name('alimento.listar');
    //Pesquisar alimento
    Route::any('/pesquisar', 'AlimentoController@search')->name('alimento.pesquisar');
    //Incluir alimento
    Route::get('/incluir', 'AlimentoController@new')->name('alimento.incluir');
    Route::post('/salvar', 'AlimentoController@create')->name('alimento.salvar');
    //Alterar alimento
    Route::get('/alterar/{id}', 'AlimentoController@update')->name('alimento.update');
    Route::post('/update/{id}', 'AlimentoController@save')->name('alimento.atualizar');
    //Remover alimento
    Route::get('/deletar/{id}', 'AlimentoController@delete')->name('alimento.deletar');
    Route::post('/excluir/{id}', 'AlimentoController@excluir')->name('alimento.excluir');
    //Consultar alimento
    Route::get('/consultar/{id}', 'AlimentoController@view')->name('alimento.consultar');
    //Cancelar alimento
    Route::get('/cancelar', 'AlimentoController@cancel')->name('alimento.cancelar');
});

Route::prefix('refeicao')->group(function () {
    //Listar alimento
    Route::get('/listar', 'RefeicaoController@index')->name('refeicao.listar');
    //Pesquisar alimento
    Route::any('/pesquisar', 'RefeicaoController@search')->name('refeicao.pesquisar');
    //Incluir alimento
    Route::get('/incluir', 'RefeicaoController@new')->name('refeicao.incluir');
    Route::post('/salvar', 'RefeicaoController@create')->name('refeicao.salvar');
    //Alterar alimento
    Route::get('/alterar/{id}', 'RefeicaoController@update')->name('refeicao.update');
    Route::post('/update/{id}', 'RefeicaoController@save')->name('refeicao.atualizar');
    //Remover alimento
    Route::get('/deletar/{id}', 'RefeicaoController@delete')->name('refeicao.deletar');
    Route::post('/excluir/{id}', 'RefeicaoController@excluir')->name('refeicao.excluir');
    //Consultar alimento
    Route::get('/consultar/{id}', 'RefeicaoController@view')->name('refeicao.consultar');
    //Cancelar alimento
    Route::get('/cancelar', 'RefeicaoController@cancel')->name('refeicao.cancelar');
});


//rotas para imagem
Route::get('/imagem/{imagem}', 'ImageController@getImages')->name('imagem.get');
Route::get('/thumbnail/{imagem}', 'ImageController@getThumbnail')->name('thumbnail.get');
Route::post('/store','ImageController@store')->name('imagem.store');
Route::post('/imagem/excluir','ImageController@excluir')->name('imagem.excluir');


//----------------------------------Rota Principal-----------------------------------
Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');
