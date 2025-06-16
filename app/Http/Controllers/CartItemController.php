<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
        };
    
        $cart = CartItem::where("user_id", $user->id)->get();
        return view("cart", compact("cart"));
    }
    public function store(Request $request, $slug)
    {
        if (auth()->check()) {
            $userID = auth()->id();
        };

        $product = Product::where("slug" , $slug)->first();

        if ($product->stock >= $request->count) 
        {
            $cartItem = CartItem::create([
                "user_id"=> $userID,
                "product_id"=> $product->id,
                "count"=> $request->count,
                "subtotal"=> $request->count*$product->price
            ]);
        }

    }

}
