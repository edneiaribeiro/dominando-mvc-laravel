<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function criar()
    {
        return view('admin.criar');
    }

    public function salvar(Request $request)
    {
        dd($request->all());
    }

    public function editar($id)
    {
        return view('admin.editar', compact('id'));
    }
}
