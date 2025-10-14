<?php

namespace Database\Seeders;

use App\Models\Order;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 3; $i++) {
            do {
                $code = strtoupper(Str::random(10)); // 10 caracteres aleatórios
            } while (Order::where('order_code', $code)->exists());

            DB::table('orders')->insert([
                'shipping_cost' => 16.7,
                'discount_amount' => 0,
                'total_price' => 66.69,
                'payment_method' => 'PIX',
                'id_transition' => Str::random(25),
                'shipping_method' => 'SEDEX',
                'user_id' => 1,
                'order_code' => $code
            ]);

            DB::table('order_product')->insert([
                'price_unit' => 49.99,
                'quantity' => 1,
                'subtotal' => 49.99,
                'product_id' => 1,
                'order_id' => $i + 1
            ]);
        }
    }
}
