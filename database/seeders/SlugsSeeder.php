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
        DB::table('slugs')->insert([
            'name' => 'Branco',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 1
        ]);
        DB::table('slugs')->insert([
            'name' => 'Preta',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 2
        ]);
        DB::table('slugs')->insert([
            'name' => 'Azul Claro',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 3
        ]);
        DB::table('slugs')->insert([
            'name' => 'Cinza Mescla',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 4
        ]);
        DB::table('slugs')->insert([
            'name' => 'Verde Oliva',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 5
        ]);
        DB::table('slugs')->insert([
            'name' => 'Preto',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 6
        ]);
        DB::table('slugs')->insert([
            'name' => 'Azul Marinho',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 7
        ]);
        DB::table('slugs')->insert([
            'name' => 'Cinza Claro',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 8
        ]);
        DB::table('slugs')->insert([
            'name' => 'Verde Militar',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 9
        ]);
        DB::table('slugs')->insert([
            'name' => 'Bege Areia',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 10
        ]);
    }
}
