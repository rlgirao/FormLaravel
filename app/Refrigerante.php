<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refrigerante extends Model
{
    protected $fillable = [
        'marca', 'tipo', 'sabor', 'litragem', 'valor', 'quantidade'
    ];
}
