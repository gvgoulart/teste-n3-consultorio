<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'adress',
        'cpf'
    ];
}
