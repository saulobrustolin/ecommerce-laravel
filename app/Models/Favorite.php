<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;
use App\Models\Slugs;

class Favorite extends Model
{
    /** @use HasFactory<\Database\Factories\FavoriteFactory> */
    use HasFactory;

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function slugs(): HasMany {
        return $this->hasMany(Slugs::class);
    }
}
