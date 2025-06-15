<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products", compact("products"));
    }
    
    public function product()
    {
        $product = Product::where("slug", $slug)->first();
        return view("product", compact("product"));
    }

    public function store()
    {
        Product::create(
            [
                "name"=> 'asdf',
                'slug'=> Str::of('asdf asdf')->slug('-'),
            ]
        )
    }
}
