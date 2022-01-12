<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FluxoTrabalhos extends Model
{
    protected $fillable = [
        'usuario_id', 'detalhes'
    ];
}
