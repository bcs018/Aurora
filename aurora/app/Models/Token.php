<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    protected $fillable = [
        'login',
        'token',
        'data',
        'hora',
        'ativo',
    ];
}
