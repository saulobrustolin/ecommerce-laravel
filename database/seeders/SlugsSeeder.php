<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SlugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Preto',
                'color' => '#000',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 4,
                'size_id' => $i,
                'price' => 59.99
            ]);
        }

        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Branco',
                'color' => '#FFF',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 3,
                'size_id' => $i,
                'price' => 79.99
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Cinza',
                'color' => '#666',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 1,
                'size_id' => $i,
                'price' => 69.99
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Azul',
                'color' => '#02066F',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 1,
                'size_id' => $i,
                'price' => 99.90
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Bege Areia',
                'color' => '#CBBD93',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 2,
                'size_id' => $i,
                'price' => 75.00
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Bege Areia',
                'color' => '#CBBD93',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 1,
                'size_id' => $i,
                'price' => 89.50
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Azul Claro',
                'color' => '#00A8FF',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 3,
                'size_id' => $i,
                'price' => 80.00
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Cinza Mescla',
                'color' => '#63625F',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 4,
                'size_id' => $i,
                'price' => 61.88
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Cinza Claro',
                'color' => '#63625F',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 8,
                'size_id' => $i,
                'price' => 111.11
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Verde Oliva',
                'color' => '#86895D',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 8,
                'size_id' => $i,
                'price' => 90.00
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Azul Marinho',
                'color' => '#000080',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 7,
                'size_id' => $i,
                'price' => 44.44
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Verde Militar',
                'color' => '#466028',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 9,
                'size_id' => $i,
                'price' => 33.33
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            DB::table('slugs')->insert([
                'name' => 'Bege Areia',
                'color' => '#CBBD93',
                'created_at' => now(),
                'updated_at' => now(),
                'available' => true,
                'product_id' => 10,
                'size_id' => $i,
                'price' => 122.00
            ]);
        }
    }
}
