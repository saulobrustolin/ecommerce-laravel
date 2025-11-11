<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('sizes')->insert([
                'name' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('sizes')->insert([
                'name' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('sizes')->insert([
                'name' => 'G',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('sizes')->insert([
                'name' => 'GG',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }
    }
}
