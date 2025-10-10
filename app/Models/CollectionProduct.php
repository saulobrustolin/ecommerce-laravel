<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionProduct extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionProductFactory> */
    use HasFactory;

    protected $table = 'collection_product';
}
