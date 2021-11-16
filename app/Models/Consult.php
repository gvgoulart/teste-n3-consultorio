<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pacient_id',
        'reason',
        'sickness',
        'date'
    ];

    public function pacient() {
        return $this->belongsTo('App\Models\Pacients');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
