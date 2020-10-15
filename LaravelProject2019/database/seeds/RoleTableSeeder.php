<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->role = 'admin';
        $role_admin->description = 'Rol has permission to access everything on this website.';
        $role_admin->save();

        $role_support = new Role();
        $role_support->role = 'support';
        $role_support->description = 'Rol has limited permission on this website';
        $role_support->save();

    }
}
