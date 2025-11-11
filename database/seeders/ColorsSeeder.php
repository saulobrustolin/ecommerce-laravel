<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('colors')->insert([
                'name' => 'Cinza',
                'color' => '#808080',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('colors')->insert([
                'name' => 'Branco',
                'color' => '#FFF',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('colors')->insert([
                'name' => 'Preto',
                'color' => '#000',
                'created_at' => now(),
                'updated_at' => now(),
                'product_id' => $i,
            ]);
        }
    }
}
