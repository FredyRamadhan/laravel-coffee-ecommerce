<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "description",
        "stock",
        "price"
    ] ;

    // $table->string('name');
    // $table->string('slug');
    // $table->text('description');
    // $table->integer('stock')->default(0);
    // $table->integer('price');
}
