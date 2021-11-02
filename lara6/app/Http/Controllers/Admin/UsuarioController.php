<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuarioController extends Controller
{
    private $model;
    private $nomeRota;
    private $pastaPrincipal;
    private $pastaSecundaria;

    public function __construct()
    {
        $this->model = new User;
        $this->titulo = 'Usuário';
        $this->titulo_plural = 'Usuários';
        $this->nomeRota = 'usuarios';
        $this->pastaPrincipal = 'admin';
    }

    public function index(Request $request)
    {

        $registro = $this->model;
        $titulo = $this->titulo;
        $nomeRota = $this->nomeRota;

        $busca = $request->busca ?? false;
        if($busca) {
            $lista = $registro->busca($busca, [
                ['coluna' => 'name', 'tipo' => 'string'],
                ['coluna' => 'email', 'tipo' => 'string'],
                ['coluna' => 'id', 'tipo' => 'number']
            ]);
        } else {
            $lista = $registro->lista();
        }

        $breadcrumb = (object) [
            (object) ["titulo" => "Principal", "link" => route('site')],
            (object) ["titulo" => "Admin", "link" => route('home')],
            (object) ["titulo" => "Lista de $titulo", "link" => ""],
        ];

        return view("$this->pastaPrincipal.$nomeRota.index", compact('lista', 'breadcrumb', 'titulo', 'nomeRota', 'busca'));
    }

    public function criar()
    {
        $titulo = $this->titulo;
        $nomeRota = $this->nomeRota;
        $breadcrumb = (object) [
            (object) ["titulo" => "Principal", "link" => route('site')],
            (object) ["titulo" => "Admin", "link" => route('home')],
            (object) ["titulo" => "Lista de $this->titulo_plural", "link" => route($nomeRota.'.index')],
            (object) ["titulo" => "Adicionar $titulo", "link" => ""],
        ];
        return view("$this->pastaPrincipal.$nomeRota.criar", compact('breadcrumb', 'titulo', 'nomeRota'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = $this->model;

        $registro->salvar($dados);

        return redirect()->route($this->nomeRota.'.index');
    }

    public function editar($id)
    {

        $registro = $this->model::find($id);
        $titulo = $this->titulo;
        $nomeRota = $this->nomeRota;

        if($registro)
        {
            $breadcrumb = (object) [
                (object) ["titulo" => "Principal", "link" => route('site')],
                (object) ["titulo" => "Admin", "link" => route('home')],
                (object) ["titulo" => "Lista de $this->titulo_plural", "link" => route($nomeRota.'.index')],
                (object) ["titulo" => "Editar $titulo", "link" => ""],
            ];
            return view("$this->pastaPrincipal.$nomeRota.editar", compact('registro', 'breadcrumb', 'titulo', 'nomeRota'));    

        } else {

            return redirect()->route("$nomeRota.index");

        }
    }

    public function atualizar(Request $request, $id)
    {

        $dados = $request->all();

        $registro = $this->model::find($id);

        $registro->atualizar($dados);

        return redirect()->route("$this->nomeRota.index");

    }

    public function visualizar($id)
    {
        $registro = $this->model::find($id);
        $titulo = $this->titulo;
        $nomeRota = $this->nomeRota;

        if($registro)
        {
            $breadcrumb = (object) [
                (object) ["titulo" => "Principal", "link" => route('site')],
                (object) ["titulo" => "Admin", "link" => route('home')],
                (object) ["titulo" => "Lista de $this->titulo_plural", "link" => route($nomeRota.'.index')],
                (object) ["titulo" => "Visualizar $titulo", "link" => ""],
            ];
            return view("$this->pastaPrincipal.$nomeRota.visualizar", compact('registro', 'breadcrumb', 'titulo'));    

        } else {

            return redirect()->route("$nomeRota.index");

        }
    }

    public function deletar($id)
    {
        $registro = $this->model::find($id);

        if($registro)
        {
            $registro->deletar();
        }

        return redirect()->route("$this->nomeRota.index");
    }
}
