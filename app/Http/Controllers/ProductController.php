<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // $user = auth()->user();
            $products = Product::latest()->paginate(10);
            return view("products", compact("products"));
        } else return redirect("/login");
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
                    "slug" => Str::slug($request->name),
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
