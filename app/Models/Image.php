<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Review;
use App\Models\Product;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    public function review(): BelongsTo {
        return $this->belongsTo(Review::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
