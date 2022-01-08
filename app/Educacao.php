<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Educacao extends Authenticatable
{
    use Notifiable;

    protected $table = 'educacoes';
    protected $fillable = [
        'usuario_id', 'escola', 'tipo', 'cidade', 'estado', 'inicio', 'fim'
    ];
}
