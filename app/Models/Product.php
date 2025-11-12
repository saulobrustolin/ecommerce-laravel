<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Order;
use App\Models\Collection;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Image;
use App\Models\Review;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = ['name', 'available', 'short_description', 'description', 'price'];

    public function order(): BelongsToMany {
        return $this->belongsToMany(Order::class)
            ->withPivot('price_unit', 'subtotal', 'quantity')
            ->withTimestamps();
    }

    public function collection(): BelongsToMany {
        return $this->belongsToMany(Collection::class)
            ->withPivot('status')
            ->withTimestamps();
    }

    public function color(): HasMany {
        return $this->hasMany(Colors::class);
    }

    public function size(): HasMany {
        return $this->hasMany(Sizes::class);
    }

    public function image(): HasMany {
        return $this->hasMany(Image::class);
    }

    public function review(): HasMany {
        return $this->hasMany(Review::class);
    }
}
