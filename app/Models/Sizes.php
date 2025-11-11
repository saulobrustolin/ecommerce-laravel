<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $fillable = ['name'];

    protected $table = 'sizes';

    public function products(): BelongsTo {
        return $this->belogsTo(Product::class);
    }
}
