<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsssistenceCenter extends Model
{
    use HasFactory;
    protected $table = 'assistence_centers';

    protected $fillable = [
        'region',
        'name',
        'street',
        'map_url'
    ];
}
