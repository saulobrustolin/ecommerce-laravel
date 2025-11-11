<?php

namespace Database\Seeders;

use App\Models\Image;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // camiseta branca básica
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615696%2F0227-N1007S-C1.jpg%3Fv%3D638933073050330000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 1
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615712%2F0227-N1007S-C2.jpg%3Fv%3D638933073087300000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 1
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615727%2F0227-N1007S-C3.jpg%3Fv%3D638933073123030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 1
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615743%2F0227-N1007S-C4.jpg%3Fv%3D638933073165870000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 1
        ]);

        // camiseta preta básica
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615696%2F0227-N1007S-C1.jpg%3Fv%3D638933073050330000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 2
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615712%2F0227-N1007S-C2.jpg%3Fv%3D638933073087300000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 2
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615727%2F0227-N1007S-C3.jpg%3Fv%3D638933073123030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 2
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4615743%2F0227-N1007S-C4.jpg%3Fv%3D638933073165870000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 2
        ]);

        // camiseta azul claro
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 3
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 3
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 3
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 3
        ]);

        // camiseta cinza mescla
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 4
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 4
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 4
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 4
        ]);

        // camiseta verde oliva
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 5
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 5
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 5
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 5
        ]);

        // calção basico preto
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 6
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 6
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 6
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 6
        ]);

        // calção azul marinho
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 7
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 7
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 7
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 7
        ]);

        // calção cinza claro
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 8
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 8
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 8
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 8
        ]);

        // calção verde militar
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 9
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 9
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 9
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 9
        ]);

        // calçao bege areia
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610133%2F0227-AZ2EN-C1.jpg%3Fv%3D638933060883500000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 10
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610160%2F0227-AZ2EN-C2.jpg%3Fv%3D638933060926730000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 10
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610182%2F0227-AZ2EN-C3.jpg%3Fv%3D638933060963030000&w=1280&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 10
        ]);
        Image::insert([
            'url' => 'https://www.hering.com.br/_next/image?url=https%3A%2F%2Fhering.vtexassets.com%2Farquivos%2Fids%2F4610197%2F0227-AZ2EN-C4.jpg%3Fv%3D638933061000370000&w=1440&q=100',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 10
        ]);
    }
}
