<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomes',
        'idades',
        'q_irmaos',
        'sexos',
        'estados_de_saude',
        'localizacao',
        'file_path',
        'descricao',
    ];
}
