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

    // Admin CRUD methods
    public function adminIndex()
    {
        $products = Product::latest()->paginate(15);
        return view("admin.products.index", compact("products"));
    }

    public function create()
    {
        return view("admin.products.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:0'
        ]);

        $product = Product::create([
            "name" => $validated['name'],
            "slug" => Str::slug($validated['name']),
            "description" => $validated['description'],
            "stock" => $validated['stock'],
            "price" => $validated['price']
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("admin.products.edit", compact("product"));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:0'
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            "name" => $validated['name'],
            "slug" => Str::slug($validated['name']),
            "description" => $validated['description'],
            "stock" => $validated['stock'],
            "price" => $validated['price']
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function test($input)
    {
        $test = $input;
        return view("test", compact("test"));
    }
}

