<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

use Illuminate\Support\Str;

use App\Models\Product;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($order) {
            do {
                $code = strtoupper(Str::random(10));
            } while (self::where('order_code', $code)->exists());

            $order->order_code = $code;
        });
    }

    public function products() {
        return $this->belongsToMany(Product::class)
            ->withPivot('price_unit', 'subtotal', 'quantity')
            ->withTimestamps();
    }
}
