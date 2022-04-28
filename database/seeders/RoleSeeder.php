<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'api'
        ]);
        
        $admin->syncPermissions([
            'add product',
            'show product',
            'edit product',
            'delete product',
            'add user',
            'show user',
            'edit user',
            'delete user',
            'add vendor',
            'show vendor',
            'edit vendor',
            'delete vendor'
        ]);

        $edit = Role::create([
            'name' => 'editor',
            'guard_name' => 'api'
        ]);
        $edit->syncPermissions([
            'add product',
            'show product',
            'edit product',
            'delete product',
            //'add user',
            //'show user',
            //'edit user',
            //'delete user',
            'add vendor',
            'show vendor',
            //'edit vendor',
            //'delete vendor'
        ]);

        $guest = Role::create([
            'name' => 'guest',
            'guard_name' => 'api'
        ]);
        $guest->syncPermissions([
            //'add product',
            'show product',
            //'edit product',
            //'delete product',
            //'add user',
            //'show user',
            //'edit user',
            //'delete user',
            //'add vendor',
            'show vendor',
            //'edit vendor',
            //'delete vendor'
        ]);

        $user = User::find(1);
        $user->syncRoles(['admin']);
        $user = User::find(2);
        $user->assignRole('editor');
        $user = User::find(3);
        $user->assignRole('guest');
     
    }
}
