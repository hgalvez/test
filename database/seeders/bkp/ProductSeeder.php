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
        //
        DB::table('products')->insert([
            'name' => Str::random(20),
            'description' => Str::random(40),
            'stock' => 10,
            'price' => 19.99,
            'vendor_id' => 1,
            'user_id' => 1
        ]);
    }
}
