<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $validate = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    private $paginacao = 5;

    public function lista()
    {
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
