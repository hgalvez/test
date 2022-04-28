<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /*   DB::table('products')->insert([
            'name' => Str::random(20),
            'description' => Str::random(40),
            'stock' => 10,
            'price' => 19.99,
            'vendor_id' => 1,
            'user_id' => 1
        ]);
        */
        DB::table('products')->insert([
            'name' => 'pinguinos',
            'description' => 'rellenos de crema',
            'stock' => 20,
            'price' => 15.60,
            'vendor_id' => 1,
            'user_id' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'gansito',
            'description' => 'de chocolate' ,
            'stock' => 65,
            'price' => 9.50,
            'vendor_id' => 1,
            'user_id' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'flippy',
            'description' => 'con mermelada',
            'stock' => 43,
            'price' => 8.99,
            'vendor_id' => 2,
            'user_id' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'tortilla harina',
            'description' => '1kg',
            'stock' => 19,
            'price' => 21.85,
            'vendor_id' => 3,
            'user_id' => 3
        ]);
        DB::table('products')->insert([
            'name' => 'tortillas de maiz',
            'description' => '1/2kg',
            'stock' => 16,
            'price' => 15.99,
            'vendor_id' => 4,
            'user_id' => 4
        ]);
        DB::table('products')->insert([
            'name' => 'coca-cola 1 litro',
            'description' => 'regular 1 litro',
            'stock' => 68,
            'price' => 14.5,
            'vendor_id' => 5,
            'user_id' => 5
        ]);
        DB::table('products')->insert([
            'name' => 'coca-cola 2 litros',
            'description' => 'regular 2 litros',
            'stock' => 24,
            'price' => 14.9,
            'vendor_id' => 6,
            'user_id' => 6
        ]);
        DB::table('products')->insert([
            'name' => 'coca-cola light 1 litro',
            'description' => 'light 1 litro',
            'stock' => 10,
            'price' => 20.50,
            'vendor_id' => 7,
            'user_id' => 7
        ]);
        DB::table('products')->insert([
            'name' => 'coca-cola light 2 litros',
            'description' => Str::random(40),
            'stock' => 10,
            'price' => 22.50,
            'vendor_id' => 7,
            'user_id' => 7
        ]);
        DB::table('products')->insert([
            'name' => 'choco roles',
            'description' => 'paquete con 2',
            'stock' => 80,
            'price' => 23.90,
            'vendor_id' => 8,
            'user_id' => 8
        ]);
        DB::table('products')->insert([
            'name' => 'bubu-lubu',
            'description' => 'pa la morrita del guaya',
            'stock' => 23,
            'price' => 8.56,
            'vendor_id' => 9,
            'user_id' => 9
        ]);
        DB::table('products')->insert([
            'name' => 'submarinos vainilla',
            'description' => 'paquete de 3',
            'stock' => 32,
            'price' => 15.23,
            'vendor_id' => 10,
            'user_id' => 10
        ]);
        DB::table('products')->insert([
            'name' => 'submarinos Fresa',
            'description' => 'paquete de 3',
            'stock' => 24,
            'price' => 15.23,
            'vendor_id' => 10,
            'user_id' => 10
        ]);
        DB::table('products')->insert([
            'name' => 'ruffles 60g',
            'description' => 'verdes con mucho aire de relleno',
            'stock' => 47,
            'price' => 351.60,
            'vendor_id' => 11,
            'user_id' => 11
        ]);
        DB::table('products')->insert([
            'name' => 'caballo con alitas',
            'description' => 'pal memin cuando anda lady',
            'stock' => 27,
            'price' => 62.47,
            'vendor_id' => 12,
            'user_id' => 12
        ]);
        DB::table('products')->insert([
            'name' => 'doritos',
            'description' => 'nachos 100g',
            'stock' => 47,
            'price' => 1054.83,
            'vendor_id' => 13,
            'user_id' => 13
        ]);
        DB::table('products')->insert([
            'name' => 'Chaira',
            'description' => '1kg embutido pa los de IT',
            'stock' => 2,
            'price' => 00.01,
            'vendor_id' => 14,
            'user_id' => 14
        ]);
        DB::table('products')->insert([
            'name' => 'morrita chucky',
            'description' => 'pal Norbewrto que no se awite por lo de la chaira',
            'stock' => 1,
            'price' => 1500.00,
            'vendor_id' => 15,
            'user_id' => 15
        ]);
        DB::table('products')->insert([
            'name' => 'cafe',
            'description' => 'tostado medio 1kg',
            'stock' => 18,
            'price' => 351.60,
            'vendor_id' => 15,
            'user_id' => 15
        ]);
        DB::table('products')->insert([
            'name' => 'leche 1 litro',
            'description' => 'sacan',
            'stock' => 13,
            'price' => 36.75,
            'vendor_id' => 15,
            'user_id' => 15
        ]);
    }
}
