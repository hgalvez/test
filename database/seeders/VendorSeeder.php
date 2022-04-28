<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('vendors')->insert([
            'name' => Str::random(20),
            'address' => Str::random(20),
            'phone' => 7762372631
        */
        //
        DB::table('vendors')->insert([
            'name' => 'Maquinados',
            'address' => 'Blvd de los Ganaderos',
            'phone' => '6621010101',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Irodi y Maquinados de Precision',
            'address' => 'Calle Rio Profundo #17',
            'phone' => '6622510447',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Mypsa',
            'address' => 'Boulevard Vildósola #229',
            'phone' => '6622505582',
        ]);

        DB::table('vendors')->insert([
            'name' => 'The Home Depot',
            'address' => 'Blvd Solidaridad 990',
            'phone' => '6622598500',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Office Depot',
            'address' => 'Luis Encinas Jhonson',
            'phone' => '6622105244',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Steren',
            'address' => 'Calle Matamoros S/N Loc 4',
            'phone' => '6622139700',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Herramientas y Servicios de Obregon',
            'address' => 'Calle Periferico Norte #54',
            'phone' => '6622100902',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Maquinados Jordan',
            'address' => 'Hidalgo #41 colonia Sahuaral',
            'phone' => '6323263145',
        ]);

        DB::table('vendors')->insert([
            'name' => 'MOGA',
            'address' => 'Cerrada Breton',
            'phone' => '6622101010',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Feinmetal',
            'address' => 'Av. Santa Fe',
            'phone' => '6622101001',
        ]);

        DB::table('vendors')->insert([
            'name' => 'HG Aceros y Metales',
            'address' => 'Musaro 142A',
            'phone' => '6622112001',
        ]);

        DB::table('vendors')->insert([
            'name' => 'PAC',
            'address' => 'Carr Mexicali Tijuana',
            'phone' => '6622112011',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Control Planta',
            'address' => 'Blvd Macario Mendoza',
            'phone' => '6622112021',
        ]);

        DB::table('vendors')->insert([
            'name' => 'Wijolika',
            'address' => 'Cerrada Opata sin numero',
            'phone' => '6622112221',
        ]);

        DB::table('vendors')->insert([
            'name' => 'SMC',
            'address' => 'Carretera Silao',
            'phone' => '6622115221',
        ]);

    }
}
