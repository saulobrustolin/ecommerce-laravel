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

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = ['name', 'available', 'short_description', 'description', 'price'];

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class)
            ->withPivot('price_unit', 'subtotal', 'quantity')
            ->withTimestamps();
    }

    public function collections(): BelongsToMany {
        return $this->belongsToMany(Collection::class)
            ->withPivot('status')
            ->withTimestamps();
    }

    public function colors(): HasMany {
        return $this->hasMany(Colors::class);
    }

    public function sizes(): HasMany {
        return $this->hasMany(Sizes::class);
    }
}
