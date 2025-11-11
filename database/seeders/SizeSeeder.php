<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            'name' => 'PP'
        ]);
        DB::table('sizes')->insert([
            'name' => 'P'
        ]);
        DB::table('sizes')->insert([
            'name' => 'M'
        ]);
        DB::table('sizes')->insert([
            'name' => 'G'
        ]);
        DB::table('sizes')->insert([
            'name' => 'GG'
        ]);
        DB::table('sizes')->insert([
            'name' => 'XGG'
        ]);
        for ($i = 32; $i < 44; $i++) {
            DB::table('sizes')->insert([
                'name' => (string)$i
            ]);
        }
    }
}
