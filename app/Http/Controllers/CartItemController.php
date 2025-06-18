<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        $cartItems = CartItem::with('product')
                            ->where("user_id", $user->id)
                            ->get();

        $subtotal = $cartItems->sum('subtotal');

        // Get shipping cost based on user's address
        $shippingCost = 0;
        $needsAddress = false;

        if ($user->address) {
            $shippingCost = $user->address->getShippingCost();
        } else {
            $needsAddress = true;
            $shippingCost = 15000; // Default shipping cost
        }

        $total = $subtotal + $shippingCost;
        $title = 'Keranjang Belanja';

        return view("cart", compact("cartItems", "subtotal", "shippingCost", "total", "needsAddress", "title"));
    }
    public function store(Request $request, $slug)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Silakan login terlebih dahulu'], 401);
            }
            return redirect('/login');
        }

        $userID = auth()->id();
        $product = Product::where("slug", $slug)->first();

        if (!$product) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan'], 404);
            }
            return back()->with('error', 'Produk tidak ditemukan');
        }

        // Validate request
        $request->validate([
            'count' => 'required|integer|min:1|max:' . $product->stock
        ]);

        if ($product->stock < $request->count) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Stok tidak mencukupi'], 400);
            }
            return back()->with('error', 'Stok tidak mencukupi');
        }

        // Check if item already exists in cart
        $existingCartItem = CartItem::where('user_id', $userID)
                                   ->where('product_id', $product->id)
                                   ->first();

        if ($existingCartItem) {
            // Update existing cart item
            $newCount = $existingCartItem->count + $request->count;
            if ($newCount > $product->stock) {
                if ($request->ajax()) {
                    return response()->json(['success' => false, 'message' => 'Total kuantitas melebihi stok yang tersedia'], 400);
                }
                return back()->with('error', 'Total kuantitas melebihi stok yang tersedia');
            }

            $existingCartItem->update([
                'count' => $newCount,
                'subtotal' => $newCount * $product->price
            ]);
        } else {
            // Create new cart item
            CartItem::create([
                "user_id" => $userID,
                "product_id" => $product->id,
                "count" => $request->count,
                "subtotal" => $request->count * $product->price
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Produk berhasil ditambahkan ke keranjang']);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function update(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'item_id' => 'required|exists:cart_items,id',
            'action' => 'required|in:increase,decrease,remove',
            'quantity' => 'sometimes|integer|min:1'
        ]);

        $cartItem = CartItem::with('product')->findOrFail($request->item_id);

        // Check if the cart item belongs to the authenticated user
        if ($cartItem->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        switch ($request->action) {
            case 'increase':
                if ($cartItem->count >= $cartItem->product->stock) {
                    return response()->json(['success' => false, 'message' => 'Stok tidak mencukupi']);
                }
                $cartItem->count += 1;
                break;

            case 'decrease':
                if ($cartItem->count <= 1) {
                    $cartItem->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Item dihapus dari keranjang',
                        'action' => 'removed'
                    ]);
                }
                $cartItem->count -= 1;
                break;

            case 'remove':
                $cartItem->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Item dihapus dari keranjang',
                    'action' => 'removed'
                ]);
        }

        $cartItem->subtotal = $cartItem->count * $cartItem->product->price;
        $cartItem->save();

        // Calculate new total
        $total = CartItem::where('user_id', auth()->id())->sum('subtotal');

        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil diperbarui',
            'item' => [
                'id' => $cartItem->id,
                'count' => $cartItem->count,
                'subtotal' => $cartItem->subtotal,
                'formatted_subtotal' => 'Rp ' . number_format($cartItem->subtotal, 0, ',', '.')
            ],
            'total' => $total,
            'formatted_total' => 'Rp ' . number_format($total, 0, ',', '.')
        ]);
    }

    public function checkout()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong');
        }

        $subtotal = $cartItems->sum('subtotal');

        // Get shipping cost - use default if no address set
        $shipping = $user->address ? $user->address->getShippingCost() : 15000;
        $total = $subtotal + $shipping;
        $title = 'Checkout';

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'title'));
    }

}
