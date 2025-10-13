<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('collections')->insert([
            'name' => 'mais vendidos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('collections')->insert([
            'name' => 'novidades',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('collections')->insert([
            'name' => 'camisetas',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('collections')->insert([
            'name' => 'calções',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('collections')->insert([
            'name' => 'chinelos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
