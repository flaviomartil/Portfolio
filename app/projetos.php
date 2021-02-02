<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projetos extends Model
{
    protected $fillable = [
        'nome', 'imagem', 'categoria_id'
    ];
}
