<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Order;
use App\Models\User;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = ['label', 'city', 'number', 'zipcode', 'street', 'state', 'obs', 'user_id'];

    public function user(): HasMany {
        return $this->hasMany(User::class);
    }

    public function order(): HasOne {
        return $this->hasOne(Order::class);
    }
}
