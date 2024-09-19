<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'bills';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = ['name', 'bill_value', 'due_date'];

    // Ocultar as colunas
    protected $hidden = [
        //'bill_value'
    ];

}
