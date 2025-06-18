<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withCount('ratings')
                          ->with('ratings')
                          ->latest()
                          ->paginate(10);
        return view("products", compact("products"));
    }
    
    public static function product($slug)
    {
        $product = Product::with('ratings')
                         ->withCount('ratings')
                         ->where("slug", $slug)
                         ->first();
        return view("product", compact("product"));
    }



    public function test($input)
    {
        $test = $input;
        return view("test", compact("test"));
    }
}

