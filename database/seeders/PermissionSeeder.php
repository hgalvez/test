<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'add product',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'show product',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'edit product',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'delete product',
            'guard_name' => 'api'
        ]);

        Permission::create([
            'name' => 'add user',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'show user',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'edit user',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'delete user',
            'guard_name' => 'api'
        ]);

        Permission::create([
            'name' => 'add vendor',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'show vendor',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'edit vendor',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'delete vendor',
            'guard_name' => 'api'
        ]);
    }
}
