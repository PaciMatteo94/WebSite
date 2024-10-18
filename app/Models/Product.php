<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category',
        'name',
        'info',
        'usage_techniques',
        'installation_mode',
        'image',
        'thumbnail',
        'malfunctions',
        'solutions'
    ];
}
