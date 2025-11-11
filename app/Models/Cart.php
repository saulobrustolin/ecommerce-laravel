<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Product;
use App\Models\User;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['quantity', 'product_id', 'user_id'];

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }
}
