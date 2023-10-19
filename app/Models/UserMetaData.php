<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMetaData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'cpf',
        'cpr',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'localidade',
        'uf',
        'ddd',
        'primary_color',
        'secondary_color',
        'seal',
        'logo',
    ];
}
