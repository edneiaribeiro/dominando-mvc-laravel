<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriaController extends Controller
{
    private $model;
    private $nomeRota;
    private $pastaPrincipal;
    private $pastaSecundaria;

    public function __construct()
    {
        $this->model = new Categoria;
        $this->nomeRota = 'categoria';
        $this->pastaPrincipal = 'admin';
        $this->pastaSecundaria = 'categorias';
    }

    public function index()
    {

        $registro = $this->model;

        $lista = $registro->lista();

        return view("$this->pastaPrincipal.$this->pastaSecundaria.index", compact('lista'));
    }

    public function criar()
    {
        return view("$this->pastaPrincipal.$this->pastaSecundaria.criar");
    }

    public function salvar(Request $request)
    {
        //dd($request->all());

        /* Exemplo 1 - para salvar a categoria pelo metodo simples, campo a campo */
    
        //$categoria = new Categoria;
        //$categoria->nome = $dados['nome'];
        //$categoria->save(); 
        

        /* Exemplo 2 - para salvar a categoria utilizando os campos fillable da classe Categoria  *
           Interessante utilizar quando temos muitos campos para salvar para nao ter que fazer um por um
           Para funcionar precisa configurar todos os campos na classe model Categoria e o array ($request) precisa enviar todos os campos configurados
        */

        //$dados = $request->all();

        //Categoria::create($dados);

        /* Exemplo 3 - para salvar a categoria colocando todas as regras/tratamentos na classe model Categoria */

        //dd(Categoria::all());

        $dados = $request->all();

        $registro = $this->model;

        $registro->salvar($dados);

        return redirect()->route($this->nomeRota.'.index');

    }

    public function editar($id)
    {

        $registro = $this->model::find($id);

        if($registro)
        {
            return view("$this->pastaPrincipal.$this->pastaSecundaria.editar", compact('registro'));    

        } else {

            return redirect()->route("$this->nomeRota.index");

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

        if($registro)
        {
            return view("$this->pastaPrincipal.$this->pastaSecundaria.visualizar", compact('registro'));    

        } else {

            return redirect()->route("$this->nomeRota.index");

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
