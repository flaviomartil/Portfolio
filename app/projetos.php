<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    protected $fillable = [
        'nome', 'imagem', 'categoria_id', 'link'
    ];
}
