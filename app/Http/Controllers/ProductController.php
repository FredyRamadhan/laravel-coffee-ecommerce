<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products", compact("products"));
    }
    
    public static function product($slug)
    {
        $input = $slug;
        $product = Product::where("slug", $input)->first();
        return view("product", compact("product"));
    }

    public function store(Request $request)
    {
        $product = Product::create([
                    "name" => $request->name,
                    "slug" => Str::of($request->name)->slug('-'),
                    "description" => $request->description,
                    "stock" => $request->stock,
                    "price" => $request->price
                ]);
    }
    public function test($input)
    {
        $test = $input;
        return view("test", compact("test"));
    }
}
