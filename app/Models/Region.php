<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lat',
        'long',
        'zoom'
    ];

    public function assistance_centers(): Relation
    {
        return $this->hasMany(AssistanceCenter::class);
    }
}
