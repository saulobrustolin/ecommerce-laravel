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
            'color' => '#FFF',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 1
        ]);
        DB::table('slugs')->insert([
            'name' => 'Preta',
            'color' => '#000',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 2
        ]);
        DB::table('slugs')->insert([
            'name' => 'Preta',
            'color' => '#000',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 6
        ]);
        DB::table('slugs')->insert([
            'name' => 'Azul Claro',
            'color' => '#00A8FF',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 3
        ]);
        DB::table('slugs')->insert([
            'name' => 'Cinza Mescla',
            'color' => '#63625F',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 4
        ]);
        DB::table('slugs')->insert([
            'name' => 'Cinza Claro',
            'color' => '#63625F',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 8
        ]);
        DB::table('slugs')->insert([
            'name' => 'Verde Oliva',
            'color' => '#86895D',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 5
        ]);
        DB::table('slugs')->insert([
            'name' => 'Azul Marinho',
            'color' => '#000080',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 7
        ]);
        DB::table('slugs')->insert([
            'name' => 'Verde Militar',
            'color' => '#466028',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 9
        ]);
        DB::table('slugs')->insert([
            'name' => 'Bege Areia',
            'color' => '#CBBD93',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 10
        ]);
    }
}
