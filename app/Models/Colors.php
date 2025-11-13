<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $fillable = ['name', 'color'];

    protected $table = 'colors';

    public function product(): BelongsTo {
        return $this->belogsTo(Product::class);
    }

    public function cart(): HasMany {
        return $this->hasMany(Cart::class);
    }
}
