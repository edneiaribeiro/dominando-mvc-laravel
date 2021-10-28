<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function salvar($dados)
    {
        /** Metodo utilizando o save, campo a campo */
        //$this->nome = 'Nome:'.$dados['nome'];
        //return $this->save();

        /** Metodo utilizando o create, salva todos os campos fillable, mas ainda podemos tratar algum campo ou campos especificos */

        //$dados['nome'] = 'Nome: '.$dados['nome'];

        return $this->create($dados);

    }
}
