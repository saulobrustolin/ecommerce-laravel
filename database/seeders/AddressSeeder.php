<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'label' => 'Casa na cidade',
            'city' => 'Passo Fundo',
            'number' => 1,
            'zipcode' => '99900000',
            'street' => 'Rua do Alta',
            'state' => 'RS',
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1
        ]);
        Address::create([
            'label' => 'Praia',
            'city' => 'Estação',
            'number' => 1222,
            'zipcode' => '99900000',
            'street' => 'Rua do Centro',
            'state' => 'RS',
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1
        ]);
    }
}
