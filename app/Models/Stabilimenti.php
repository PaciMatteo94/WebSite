<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stabilimenti extends Model
{
    use HasFactory;
    protected $table = 'stabilimenti';

    protected $fillable = [
        'regione',
        'nome_stabilimento',
        'via',
        'mappa_url'
    ];
}
