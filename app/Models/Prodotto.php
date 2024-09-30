<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    use HasFactory;

    protected $table = 'Prodotti';

    protected $fillable = [
        'categoria',
        'nome_prodotto',
        'info_prodotto'
    ];
}
