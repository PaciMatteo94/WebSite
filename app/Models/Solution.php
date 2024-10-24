<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    protected $table = 'solutions';

    protected $fillable = [
        'malfunction_id',
        'title',
        'description'
    ];

    public function malfunction()
    {
        return $this->belongsTo(Malfunction::class);
    }

}
