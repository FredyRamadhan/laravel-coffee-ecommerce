<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{   
    protected $fillable = [
        "user_id",
        "product_id",
        "count",
        "subtotal",
        "shipping" ];
}
