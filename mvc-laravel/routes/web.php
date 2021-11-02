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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lista', 'Admin\ClienteController@lista')->name('lista');

Route::get('/admin/categorias', 'Admin\CategoriaController@index')->name('categorias.index');
Route::get('/admin/categorias/criar', 'Admin\CategoriaController@criar')->name('categorias.criar');
Route::post('/admin/categorias/criar', 'Admin\CategoriaController@salvar')->name('categorias.salvar');
Route::get('/admin/categorias/editar/{id}', 'Admin\CategoriaController@editar')->name('categorias.editar');
Route::put('/admin/categorias/editar/{id}', 'Admin\CategoriaController@atualizar')->name('categorias.atualizar');
Route::get('/admin/categorias/visualizar/{id}', 'Admin\CategoriaController@visualizar')->name('categorias.visualizar');
Route::delete('/admin/categorias/deletar/{id}', 'Admin\CategoriaController@deletar')->name('categorias.deletar');


Route::get('/admin/usuarios', 'Admin\UsuarioController@index')->name('usuarios.index');
Route::get('/admin/usuarios/criar', 'Admin\UsuarioController@criar')->name('usuarios.criar');
Route::post('/admin/usuarios/criar', 'Admin\UsuarioController@salvar')->name('usuarios.salvar');
Route::get('/admin/usuarios/editar/{id}', 'Admin\UsuarioController@editar')->name('usuarios.editar');
Route::put('/admin/usuarios/editar/{id}', 'Admin\UsuarioController@atualizar')->name('usuarios.atualizar');
Route::get('/admin/usuarios/visualizar/{id}', 'Admin\UsuarioController@visualizar')->name('usuarios.visualizar');
Route::delete('/admin/usuarios/deletar/{id}', 'Admin\UsuarioController@deletar')->name('usuarios.deletar');



