<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $fillable = [
        'id',
        'conteudo',
        'video_diretorio',
        'slide_diretorio',
        'ata_diretorio',
    ];
}
