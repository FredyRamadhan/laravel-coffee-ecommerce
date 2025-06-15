<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillables = [
        "user_id",
        "product_id",
        "rating"
        ];
}
