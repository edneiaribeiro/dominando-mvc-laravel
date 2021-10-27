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

Route::get('/admin/categorias/editar/{id}', 'Admin\CategoriaController@editar')->name('categoria.editar');

Route::post('/admin/categorias/criar', 'Admin\CategoriaController@salvar')->name('categoria.salvar');

