<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Product;

class Collection extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionFactory> */
    use HasFactory;

    protected $fillable = ['name'];
    
    public function product(): BelongsToMany {
        return $this->belongsToMany(Product::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
