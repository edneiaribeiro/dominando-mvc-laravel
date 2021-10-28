<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Categoria extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function lista()
    {
        //$lista = Categoria::all();
        //$lista = Categoria::orderBy('id', 'desc')->get();
        return $this->orderBy('id', 'desc')->paginate(3);
    }

    public function salvar($dados)
    {
        /** Metodo utilizando o save, campo a campo */
        //$this->nome = 'Nome:'.$dados['nome'];
        //return $this->save();

        /** Metodo utilizando o create, salva todos os campos fillable, mas ainda podemos tratar algum campo ou campos especificos */

        //$dados['nome'] = 'Nome: '.$dados['nome'];

        Validator::make($dados, [
            'nome'=>'required'

        ])->validate();

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
        Validator::make($dados, [
            'nome'=>'required'

        ])->validate();

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
