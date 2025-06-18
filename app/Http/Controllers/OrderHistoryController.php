<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\OrderHistory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderHistoryController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $orders = OrderHistory::with('product')
                             ->where('user_id', auth()->id())
                             ->orderBy('created_at', 'desc')
                             ->get()
                             ->groupBy('order_number');

        $title = 'Riwayat Pesanan';
        return view('order-history', compact('orders', 'title'));
    }

    public function checkout(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong');
        }

        // Validate request
        $request->validate([
            'customer_address' => 'required|string|max:500',
            'customer_phone' => 'required|string|max:100',
        ]);

        // Get customer address and phone
        $customerAddress = $request->customer_address;
        $customerPhone = $request->customer_phone;

        // Generate unique order number
        do {
            $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6));
        } while (OrderHistory::where('order_number', $orderNumber)->exists());

        $total = 0;
        $shippingCost = $user->address ? $user->address->getShippingCost() : 15000;

        // Create order history entries for each cart item
        foreach ($cartItems as $cartItem) {
            // Check stock availability
            if ($cartItem->product->stock < $cartItem->count) {
                return redirect()->route('cart')->with('error',
                    "Stok {$cartItem->product->name} tidak mencukupi. Stok tersedia: {$cartItem->product->stock}");
            }

            $orderHistory = OrderHistory::create([
                'user_id' => $user->id,
                'product_id' => $cartItem->product_id,
                'order_number' => $orderNumber,
                'count' => $cartItem->count,
                'subtotal' => $cartItem->subtotal,
                'shipping' => $shippingCost,
                'total' => $cartItem->subtotal + $shippingCost,
                'status' => 'completed',
                'customer_address' => $customerAddress,
                'customer_phone' => $customerPhone,
            ]);

            // Update product stock
            $cartItem->product->decrement('stock', $cartItem->count);

            $total += $cartItem->subtotal;
        }

        // Clear cart
        CartItem::where('user_id', $user->id)->delete();

        // Redirect to invoice
        return redirect()->route('invoice', $orderNumber);
    }

    public function invoice($orderNumber)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $orders = OrderHistory::with('product', 'user')
                             ->where('order_number', $orderNumber)
                             ->where('user_id', auth()->id())
                             ->get();

        if ($orders->isEmpty()) {
            abort(404, 'Invoice tidak ditemukan');
        }

        $title = 'Invoice - ' . $orderNumber;
        return view('invoice', compact('orders', 'orderNumber', 'title'));
    }
}
