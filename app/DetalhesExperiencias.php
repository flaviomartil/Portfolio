<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DetalhesExperiencias extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *            $table->increments('id');
      
     * @var array
     */
    protected $table = 'detalhes_experiencias';
    protected $fillable = [
        'detalhes', 'experiencia_id'
    ];
}
