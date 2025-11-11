<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Product;
use App\Models\Sizes;

class Slugs extends Model
{
    /** @use HasFactory<\Database\Factories\SlugsFactory> */
    use HasFactory;

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function sizes(): BelongsTo {
        return $this->belongsTo(Sizes::class);
    }
}
