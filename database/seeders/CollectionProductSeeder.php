<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CollectionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // mais vendidos (3 de cada coleção)
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 1
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 3
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 2
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 6
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 9
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 7
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 15
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 11
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 1,
            'product_id' => 14
        ]);

        // novidades (1 de cada coleção)
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 2,
            'product_id' => 11
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 2,
            'product_id' => 6
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 2,
            'product_id' => 1
        ]);

        // camisetas
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 3,
            'product_id' => 1
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 3,
            'product_id' => 2
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 3,
            'product_id' => 3
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 3,
            'product_id' => 4
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 3,
            'product_id' => 5
        ]);

        // calções
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 4,
            'product_id' => 6
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 4,
            'product_id' => 7
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 4,
            'product_id' => 8
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 4,
            'product_id' => 9
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 4,
            'product_id' => 10
        ]);

        // chinelos
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 5,
            'product_id' => 11
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 5,
            'product_id' => 12
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 5,
            'product_id' => 13
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 5,
            'product_id' => 14
        ]);
        DB::table('collection_product')->insert([
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'collection_id' => 5,
            'product_id' => 15
        ]);
    }
}
