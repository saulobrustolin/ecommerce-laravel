<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Colors;
use App\Models\Sizes;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;

    protected $table = 'order_product';

    public function size()
    {
        return $this->belongsTo(Sizes::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(Colors::class, 'color_id');
    }
}
