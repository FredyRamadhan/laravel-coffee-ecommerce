<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\ShippingCost;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $address = auth()->user()->address;
        $cities = ShippingCost::orderBy('kota')->get();
        $title = 'Alamat Pengiriman';

        return view('address.index', compact('address', 'cities', 'title'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $request->validate([
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
        ]);

        $user = auth()->user();

        // Check if user already has an address
        if ($user->address) {
            // Update existing address
            $user->address->update([
                'address' => $request->address,
                'city' => $request->city,
            ]);
            $message = 'Alamat berhasil diperbarui';
        } else {
            // Create new address
            Address::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'city' => $request->city,
            ]);
            $message = 'Alamat berhasil ditambahkan';
        }

        return back()->with('success', $message);
    }

    public function getShippingCost(Request $request)
    {
        $city = $request->input('city');
        $cost = ShippingCost::getCostByCity($city);

        return response()->json([
            'success' => true,
            'cost' => $cost,
            'formatted_cost' => 'Rp ' . number_format($cost, 0, ',', '.')
        ]);
    }
}
