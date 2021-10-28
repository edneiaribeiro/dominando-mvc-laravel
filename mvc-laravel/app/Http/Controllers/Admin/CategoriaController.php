<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('admin.categorias.index');
    }

    public function criar()
    {
        return view('admin.categorias.criar');
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
        $dados = $request->all();

        $categoria = new Categoria;

        $categoria->salvar($dados);

        dd(Categoria::all());

    }

    public function editar($id)
    {
        return view('admin.categorias.editar', compact('id'));
    }
}
