<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adotante',
        'adotante_id',
        'adotante_email',
        'adotada',
        'adotada_id',
        'status',
        'motivacao',
        'data',
        'file_path',
        'depoimento',
    ];
}
