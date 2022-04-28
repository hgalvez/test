<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Humberto Galvez',
            'email' => 'hgalvez@nai-group.com',
            'birthdate' => '1984-11-15',
            'phone'=>'6621943537',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pepito Perez',
            'email' => 'Pepe@hotmail.com',
            'birthdate' => '1998-10-05',
            'phone'=>'6621887744',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Juan Alvarez',
            'email' => 'jalvarez@hotmail.com',
            'birthdate' => '1981-01-03',
            'phone'=>'6621445511',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Arturo Velazquez',
            'email' => 'avel@gmail.com',
            'birthdate' => '1994-11-25',
            'phone'=>'6621557744',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ali Alvarez',
            'email' => 'alia@yahoo.com',
            'birthdate' => '1987-10-15',
            'phone'=>'6621554478',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alberto Gomez',
            'email' => 'agomez@yahoo.com',
            'birthdate' => '1988-12-25',
            'phone'=>'6621985432',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Roberto Beltran',
            'email' => 'rbeltran@hotmail.com',
            'birthdate' => '1984-11-15',
            'phone'=>'6621854712',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mario Arce',
            'email' => 'marce@nai-group.com',
            'birthdate' => '1994-05-11',
            'phone'=>'6621874125',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Rosario Valdez',
            'email' => 'rvaldez@hotmail.com',
            'birthdate' => '1995-11-17',
            'phone'=>'6621874512',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Veronica Hurtado',
            'email' => 'verinicah@gmail.com',
            'birthdate' => '1984-11-15',
            'phone'=>'6621874514',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mayra Vazquez',
            'email' => 'mayrav@outlook.com',
            'birthdate' => '1974-11-02',
            'phone'=>'6621879865',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Chritina Velazquez',
            'email' => 'cvel@gmail.com',
            'birthdate' => '1995-01-15',
            'phone'=>'6621542132',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Adalberto Lopez',
            'email' => 'alopez@outlook.com',
            'birthdate' => '1998-02-01',
            'phone'=>'6621985421',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ramon Fernandez',
            'email' => 'rfernandez@gmail.com',
            'birthdate' => '1956-07-25',
            'phone'=>'6621255887',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Esmeralda Rodriguez',
            'email' => 'esmeraldar@gmail.com',
            'birthdate' => '1998-08-15',
            'phone'=>'6621985487',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Rodrigo Leon',
            'email' => 'rleon@outlook.com',
            'birthdate' => '1994-11-16',
            'phone'=>'6621875498',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Martin Gamez',
            'email' => 'mgamez@outlook.com',
            'birthdate' => '2001-11-25',
            'phone'=>'6621831795',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Arturo Felix',
            'email' => 'afelix@outlook.com',
            'birthdate' => '2000-01-15',
            'phone'=>'6621988798',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Raul Molina',
            'email' => 'rmolina@outlook.com',
            'birthdate' => '1999-02-25',
            'phone'=>'6621112544',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mariana Salazar',
            'email' => 'masalazar@hotmail.com',
            'birthdate' => '1994-05-01',
            'phone'=>'6621958451',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alondra Gonzalez',
            'email' => 'agonzalez@gmail.com',
            'birthdate' => '2002-05-04',
            'phone'=>'6621988798',
            'password' => Hash::make('password'),
        ]);

      

    }
}
