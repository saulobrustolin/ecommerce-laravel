<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $fillable = ['name', 'color'];

    protected $table = 'colors';

    public function products(): BelongsTo {
        return $this->belogsTo(Product::class);
    }
}
