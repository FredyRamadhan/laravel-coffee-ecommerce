<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    protected $fillable = [
        "kota",
        "cost"
    ];

    public static function getCostByCity($city)
    {
        return self::where('kota', $city)->first()?->cost ?? 15000;
    }
}
