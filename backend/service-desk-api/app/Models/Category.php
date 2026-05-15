<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'area_id',
        'name',
        'slug',
        'description',
        'is_active',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}