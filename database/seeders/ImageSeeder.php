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

        // havaianas brasil
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4110850-brasil-logo-0001-0_cdb76ee2-83c9-42ec-a5c2-b1ecfc76095a.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 11
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4110850-0001-brasil-logo-0.png?v=1737464170&amp;width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 11
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4110850-brasil-logo-0001-5_9dc69e4a-5b38-4d0d-9317-b54e5fcba7d1.jpg?v=1737464170&amp;width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 11
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4110850-brasil-logo-0001-6_3402b224-1266-4300-8914-b82c6517f9e1.jpg?v=1737464170&amp;width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 11
        ]);

        // havaianas top basic
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4150268-7663-city-basic-0.png?v=1747767954&width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 12
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4150268-7663-city-basic-1.png?v=1747767954&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 12
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4150268-7663-city-basic-2.png?v=1747767954&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 12
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4150268-7663-city-basic-4.png?v=1747767954&width=990',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 12
        ]);

        // havaianas dual
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4145602-havaianas-dual-7202-0_8076a48f-78e7-49e3-9170-2b76ca5736d5.jpg?v=1734128011&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 13
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4145602-havaianas-dual-7202-1_95f7ce74-3237-476e-bf49-e57c2def04e5.jpg?v=1734128011&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 13
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4145602-havaianas-dual-7202-2_422e7325-fd07-4831-888e-496eb8d6beed.jpg?v=1734128011&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 13
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4145602-havaianas-dual-7202-3_4d7836d2-9e6e-4e90-96db-6c361c343642.jpg?v=1734128011&width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 13
        ]);

        // havaianas top pride
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4146673-top-pride-0128-0_7114b321-ec90-48f0-9ef7-335c6e5a41b0.jpg?v=1734123869&width=990',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 14
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4146673-top-pride-0128-1_8c2e2cdb-6caf-4764-9a8e-608ae8e0e520.jpg?v=1734123869&width=990',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 14
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4146673-top-pride-0128-2_94d483f9-2c1d-4f1f-9111-d6dd950aa92d.jpg?v=1734123869&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 14
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4146673-top-pride-0128-3_0f4ea8fb-d38c-495a-9b62-4273324db9c7.jpg?v=1734123869&width=823',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 14
        ]);

        // havaianas simpsons
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4137889-simpsons-0121-0_f1d2879c-a393-458d-bb54-1856a4b8e9df.jpg?v=1734126605&width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 15
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4137889-simpsons-0121-1_aaf9a655-3b2e-458d-8fe9-b7e5f0e8f9fa.jpg?v=1734126606&width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 15
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4137889-simpsons-0121-2_841391b9-c835-481b-9c57-81fb5d7f0183.jpg?v=1734126606&width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 15
        ]);
        Image::insert([
            'url' => 'https://havaianas.com.br/cdn/shop/files/4137889-simpsons-0121-3_26a422b7-f6b8-4b2d-b8d3-85992d6233c9.jpg?v=1734126606&width=1946',
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => 15
        ]);
    }
}
