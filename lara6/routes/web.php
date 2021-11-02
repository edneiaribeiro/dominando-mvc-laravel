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

Route::get('/', function () {
    return view('welcome');
})->name('site');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {

    Route::get('/lista', 'ClienteController@lista')->name('lista');

    Route::get('/categorias', 'CategoriaController@index')->name('categorias.index');
    Route::get('/categorias/criar', 'CategoriaController@criar')->name('categorias.criar');
    Route::post('/categorias/criar', 'CategoriaController@salvar')->name('categorias.salvar');
    Route::get('/categorias/editar/{id}', 'CategoriaController@editar')->name('categorias.editar');
    Route::put('/categorias/editar/{id}', 'CategoriaController@atualizar')->name('categorias.atualizar');
    Route::get('/categorias/visualizar/{id}', 'CategoriaController@visualizar')->name('categorias.visualizar');
    Route::delete('/categorias/deletar/{id}', 'CategoriaController@deletar')->name('categorias.deletar');
    
    Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
    Route::get('/usuarios/criar', 'UsuarioController@criar')->name('usuarios.criar');
    Route::post('/usuarios/criar', 'UsuarioController@salvar')->name('usuarios.salvar');
    Route::get('/usuarios/editar/{id}', 'UsuarioController@editar')->name('usuarios.editar');
    Route::put('/usuarios/editar/{id}', 'UsuarioController@atualizar')->name('usuarios.atualizar');
    Route::get('/usuarios/visualizar/{id}', 'UsuarioController@visualizar')->name('usuarios.visualizar');
    Route::delete('/usuarios/deletar/{id}', 'UsuarioController@deletar')->name('usuarios.deletar');
});

