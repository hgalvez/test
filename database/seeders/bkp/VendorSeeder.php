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
        //
        DB::table('vendors')->insert([
            'name' => Str::random(20),
            'address' => Str::random(20),
            'phone' => 7762372631
        ]);
    }
}
