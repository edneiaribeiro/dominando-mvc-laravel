<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function lista()
    {
        return (object) [
            (object) ["nome" => "Pedro"],
            (object) ["nome" => "Tiago"],
            (object) ["nome" => "João"]
        ];
    }
}
