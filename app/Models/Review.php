<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Product;
use App\Models\User;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function user(): HasMany {
        return $this->hasMany(User::class);
    }
}
