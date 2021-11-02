<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Categoria extends Model
{
    protected $fillable = [
        'nome'
    ];

    private $validate = [
        'nome'=>'required'
    ];

    private $paginacao = 5;

    public function lista()
    {
        //$lista = Categoria::all();
        //$lista = Categoria::orderBy('id', 'desc')->get();
        return $this->orderBy('id', 'desc')->paginate($this->paginacao);
    }

    public function busca(string $busca, array $colunas)
    {
        return $this->where(function($query) use ($busca, $colunas) {
            foreach ($colunas as $key => $coluna) {
                
                if ($coluna['tipo'] == 'string') {
                    $query->orWhere($coluna['coluna'], 'like', '%'.$busca.'%');
                }

                if ($coluna['tipo'] == 'number') {
                    $query->orWhere($coluna['coluna'], '=', $busca);
                }
            }
        })->orderBy('id', 'desc')->paginate($this->paginacao);
    }

    public function salvar($dados)
    {
        /** Metodo utilizando o save, campo a campo */
        //$this->nome = 'Nome:'.$dados['nome'];
        //return $this->save();

        /** Metodo utilizando o create, salva todos os campos fillable, mas ainda podemos tratar algum campo ou campos especificos */

        //$dados['nome'] = 'Nome: '.$dados['nome'];

        Validator::make($dados, $this->validate)->validate();

        $ret = $this->create($dados);

        if($ret){

            session()->flash('msg', 'Registro criado com sucesso!');

            session()->flash('status', 'success');

            return $ret;

        } else {

            session()->flash('msg', 'Erro no sistema!');

            session()->flash('status', 'danger');

            return $ret;
        }

    }

    public function atualizar($dados)
    {
        Validator::make($dados, $this->validate)->validate();

        $ret = $this->update($dados);

        if($ret){

            session()->flash('msg', 'Registro atualizado com sucesso!');

            session()->flash('status', 'success');

            return $ret;

        } else {

            session()->flash('msg', 'Erro no sistema!');

            session()->flash('status', 'danger');

            return $ret;
        }

    }

    public function deletar()
    {
        $this->delete();    

        session()->flash('msg', 'Registro deletado com sucesso!');

        session()->flash('status', 'success');

    }

}
