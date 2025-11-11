<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Review;
use App\Models\Slugs;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    public function reviews(): HasMany {
        return $this->hasMany(Review::class);
    }

    public function slugs(): HasMany {
        return $this->hasMany(Slugs::class);
    }
}
