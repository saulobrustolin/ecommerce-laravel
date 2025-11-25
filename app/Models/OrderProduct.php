<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Colors;
use App\Models\Sizes;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Pivot
{
    use HasFactory;

    protected $table = 'order_product';

    public function size(): BelongsTo
    {
        return $this->belongsTo(Sizes::class, 'size_id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Colors::class, 'color_id');
    }
}
