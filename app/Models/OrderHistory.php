<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderHistory extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
        "order_number",
        "count",
        "subtotal",
        "shipping",
        "total",
        "status",
        "customer_address",
        "customer_phone"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function canBeRated(): bool
    {
        return $this->status === 'completed' && !$this->hasRating();
    }

    public function hasRating(): bool
    {
        return Rating::where('user_id', $this->user_id)
                    ->where('product_id', $this->product_id)
                    ->exists();
    }

    public function getRating()
    {
        return Rating::where('user_id', $this->user_id)
                    ->where('product_id', $this->product_id)
                    ->first();
    }
}
