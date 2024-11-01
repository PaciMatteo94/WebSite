<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'info',
        'usage_techniques',
        'installation_mode',
        'image',
        'thumbnail'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function malfunctions(){
        return $this->hasMany(Malfunction::class);
    }
    public function solutions(): HasManyThrough
    {
        return $this->hasManyThrough(Solution::class, Malfunction::class, 'product_id', 'malfunction_id', 'id', 'id');
    }
}
