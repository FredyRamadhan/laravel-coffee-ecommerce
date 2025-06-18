<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $orderHistoryId)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $orderHistory = OrderHistory::with('product')
                                   ->where('id', $orderHistoryId)
                                   ->where('user_id', auth()->id())
                                   ->where('status', 'completed')
                                   ->first();

        if (!$orderHistory) {
            return back()->with('error', 'Pesanan tidak ditemukan atau tidak dapat diberi rating');
        }

        // Check if user already rated this product
        $existingRating = Rating::where('user_id', auth()->id())
                               ->where('product_id', $orderHistory->product_id)
                               ->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update([
                'rating' => $request->rating
            ]);
            $message = 'Rating berhasil diperbarui';
        } else {
            // Create new rating
            Rating::create([
                'user_id' => auth()->id(),
                'product_id' => $orderHistory->product_id,
                'rating' => $request->rating
            ]);
            $message = 'Rating berhasil diberikan';
        }

        return back()->with('success', $message);
    }
}
