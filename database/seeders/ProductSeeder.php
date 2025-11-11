<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // camisetas
        DB::table('products')->insert([
            'name' => 'Camiseta Branca Básica',
            'short_description' => 'Camiseta leve e confortável, essencial para dias quentes.',
            'description' => 'A Camiseta Branca Básica é feita em algodão macio e respirável, garantindo conforto e frescor no verão. Combina com qualquer look casual e é ideal para uso diário.',
        ]);

        DB::table('products')->insert([
            'name' => 'Camiseta Preta Básica',
            'short_description' => 'Visual minimalista e moderno com tecido leve e macio.',
            'description' => 'A Camiseta Preta Básica é perfeita para quem busca praticidade e estilo. Produzida em algodão premium, oferece ótimo caimento e conforto durante todo o dia.',
        ]);

        DB::table('products')->insert([
            'name' => 'Camiseta Azul Claro',
            'short_description' => 'Camiseta leve com toque suave e cor vibrante para o verão.',
            'description' => 'A Camiseta Azul Claro é confeccionada em malha respirável, ideal para dias ensolarados. Seu tom suave transmite frescor e combina facilmente com bermudas ou calções.',
        ]);

        DB::table('products')->insert([
            'name' => 'Camiseta Cinza Mescla',
            'short_description' => 'Estilo casual e versátil com tecido macio e confortável.',
            'description' => 'A Camiseta Cinza Mescla é feita com algodão e poliéster para garantir leveza e durabilidade. Ideal para composições básicas e looks urbanos de verão.',
        ]);

        DB::table('products')->insert([
            'name' => 'Camiseta Verde Oliva',
            'short_description' => 'Modelo moderno com cor natural e toque suave.',
            'description' => 'A Camiseta Verde Oliva une conforto e autenticidade. Feita com tecido respirável, é perfeita para o calor e combina com calções, jeans ou bermudas.',
        ]);

        // calções
        DB::table('products')->insert([
            'name' => 'Calção Básico Preto',
            'short_description' => 'Calção leve e confortável, ideal para o verão e atividades ao ar livre.',
            'description' => 'O Calção Básico Preto é feito em tecido leve e respirável, proporcionando conforto durante o calor. Possui cós elástico e cordão para ajuste perfeito, ideal para passeios, praia ou treino.',
        ]);
        DB::table('products')->insert([
            'name' => 'Calção Azul Marinho',
            'short_description' => 'Design versátil com toque esportivo e acabamento resistente.',
            'description' => 'O Calção Azul Marinho combina estilo e praticidade. Confeccionado em poliéster leve, seca rápido e garante mobilidade. Ideal para dias quentes e uso casual.',
        ]);
        DB::table('products')->insert([
            'name' => 'Calção Cinza Claro',
            'short_description' => 'Modelo minimalista para o dia a dia, com ótimo caimento e tecido respirável.',
            'description' => 'O Calção Cinza Claro é ideal para quem busca conforto com estilo discreto. Seu tecido leve e ventilado garante bem-estar em qualquer atividade ao ar livre.',
        ]);
        DB::table('products')->insert([
            'name' => 'Calção Verde Militar',
            'short_description' => 'Visual moderno com toque urbano, ideal para composições casuais.',
            'description' => 'O Calção Verde Militar oferece um visual contemporâneo e confortável. Possui bolsos laterais funcionais e cós elástico ajustável, perfeito para o uso diário.',
        ]);
        DB::table('products')->insert([
            'name' => 'Calção Bege Areia',
            'short_description' => 'Leve, casual e elegante, perfeito para o calor e o lazer.',
            'description' => 'O Calção Bege Areia é confeccionado em tecido leve e confortável, com corte reto e cós ajustável. Combina facilmente com camisetas básicas e sandálias, ideal para o verão.',
        ]);

        // chinelos
        DB::table('products')->insert([
            'name' => 'Havaianas Brasil',
            'short_description' => 'Sandália clássica Havaianas com bandeira do Brasil. Conforto e estilo para o dia a dia.',
            'description' => 'As Havaianas Brasil são um ícone do design nacional, conhecidas pelo conforto e durabilidade. Possuem solado de borracha macia, tiras resistentes e a tradicional bandeirinha do Brasil em destaque. Ideais para uso diário, praia ou lazer, combinando com qualquer look casual.',
        ]);
        DB::table('products')->insert([
            'name' => 'Havaianas Top Basic',
            'short_description' => 'Sandália clássica Havaianas com bandeira do Brasil. Conforto e estilo para o dia a dia.',
            'description' => 'As Havaianas Top Basic são um ícone do design nacional, conhecidas pelo conforto e durabilidade. Possuem solado de borracha macia, tiras resistentes e a tradicional bandeirinha do Brasil em destaque. Ideais para uso diário, praia ou lazer, combinando com qualquer look casual.',
        ]);
        DB::table('products')->insert([
            'name' => 'Havaianas Dual',
            'short_description' => 'Sandália clássica Havaianas com bandeira do Brasil. Conforto e estilo para o dia a dia.',
            'description' => 'As Havaianas Dual são um ícone do design nacional, conhecidas pelo conforto e durabilidade. Possuem solado de borracha macia, tiras resistentes e a tradicional bandeirinha do Brasil em destaque. Ideais para uso diário, praia ou lazer, combinando com qualquer look casual.',
        ]);
        DB::table('products')->insert([
            'name' => 'Havaianas Top Pride',
            'short_description' => 'Sandália clássica Havaianas com bandeira do Brasil. Conforto e estilo para o dia a dia.',
            'description' => 'As Havaianas Top Pride são um ícone do design nacional, conhecidas pelo conforto e durabilidade. Possuem solado de borracha macia, tiras resistentes e a tradicional bandeirinha do Brasil em destaque. Ideais para uso diário, praia ou lazer, combinando com qualquer look casual.',
        ]);
        DB::table('products')->insert([
            'name' => 'Havaianas Simpsons',
            'short_description' => 'Sandália clássica Havaianas com bandeira do Brasil. Conforto e estilo para o dia a dia.',
            'description' => 'As Havaianas Simpsons são um ícone do design nacional, conhecidas pelo conforto e durabilidade. Possuem solado de borracha macia, tiras resistentes e a tradicional bandeirinha do Brasil em destaque. Ideais para uso diário, praia ou lazer, combinando com qualquer look casual.',
        ]);
    }
}
