<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malfunction extends Model
{
    use HasFactory;

    protected $table = 'malfunctions';

    protected $fillable = [
        'product_id',
        'title',
        'description'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function solutions(){
        return $this->hasMany(Solution::class);
    }

}
