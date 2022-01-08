<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    protected $fillable = [
        'usuario_id', 'detalhes'
    ];
}
