<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\User;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = ['status'];

    protected static function booted()
    {
        static::creating(function ($order) {
            do {
                $code = strtoupper(Str::random(10));
            } while (self::where('order_code', $code)->exists());

            $order->order_code = $code;
        });
    }

    public function product(): BelongsToMany 
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->using(OrderProduct::class)
            ->withPivot('price_unit', 'subtotal', 'quantity', 'size_id', 'color_id')
            ->withTimestamps();
    }

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
