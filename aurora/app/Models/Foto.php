<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;

class Foto extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'diretorio',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
