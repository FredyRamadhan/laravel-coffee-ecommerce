<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "description",
        "stock",
        "price"
    ];

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating') ?: 0, 1);
    }

    public function getRatingCountAttribute()
    {
        return $this->ratings()->count();
    }
}
