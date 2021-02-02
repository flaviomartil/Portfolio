<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sobreMim extends Model
{
    protected $fillable = [
        'nome', 'website', 'telefone','cidade_atual','idade','email','freelance_status'
    ];
}
