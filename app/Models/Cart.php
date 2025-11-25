<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Product;
use App\Models\User;
use App\Models\Sizes;
use App\Models\Colors;
use App\Models\Address;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['quantity', 'product_id', 'user_id', 'size_id', 'color_id'];

    public function product(): BelongsTo 
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function size(): BelongsTo 
    {
        return $this->belongsTo(Sizes::class);
    }

    public function color(): BelongsTo 
    {
        return $this->belongsTo(Colors::class);
    }
}
