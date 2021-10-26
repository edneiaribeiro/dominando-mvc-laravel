<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cliente;

class ClienteController extends Controller
{
    public function lista()
    {
        $cliente = new Cliente;

        //dd($cliente->lista());

        $lista = $cliente->lista();

        return view('clientes.cliente', compact('lista'));
    }
}
