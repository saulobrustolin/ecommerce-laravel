<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

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
}
