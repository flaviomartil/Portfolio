<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Experiencias extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *            $table->increments('id');
      
     * @var array
     */
    protected $table = 'experiencias';
    protected $fillable = [
        'usuario_id', 'cargo', 'inicio', 'fim'
    ];
}
