<?php

namespace Database\Seeders;

use App\Models\Cart;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            Cart::insert([
                'user_id' => 1,
                'product_id' => $i,
                'quantity' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        };
    }
}
