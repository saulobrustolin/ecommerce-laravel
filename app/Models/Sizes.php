<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $fillable = ['name'];

    protected $table = 'sizes';

    public function product(): BelongsTo {
        return $this->belogsTo(Product::class);
    }

    public function cart(): HasMany {
        return $this->hasMany(Cart::class);
    }
}
