<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class AssistanceCenter extends Model
{
    use HasFactory;
    protected $table = 'assistance_centers';

    protected $fillable = [
        'region', // da togliere
        'region_id',
        'name',
        'street',
        'lat',
        'long'
    ];

    public function region(): Relation
    {
        return $this->belongsTo(Region::class);
    }
}
