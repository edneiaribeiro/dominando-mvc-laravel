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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lista', 'Admin\ClienteController@lista')->name('lista');

Route::get('/admin/categorias', 'Admin\CategoriaController@index')->name('categoria.index');

Route::get('/admin/categorias/criar', 'Admin\CategoriaController@criar')->name('categoria.criar');

Route::post('/admin/categorias/criar', 'Admin\CategoriaController@salvar')->name('categoria.salvar');

Route::get('/admin/categorias/editar/{id}', 'Admin\CategoriaController@editar')->name('categoria.editar');

Route::put('/admin/categorias/editar/{id}', 'Admin\CategoriaController@atualizar')->name('categoria.atualizar');

Route::get('/admin/categorias/visualizar/{id}', 'Admin\CategoriaController@visualizar')->name('categoria.visualizar');

Route::delete('/admin/categorias/deletar/{id}', 'Admin\CategoriaController@deletar')->name('categoria.deletar');


