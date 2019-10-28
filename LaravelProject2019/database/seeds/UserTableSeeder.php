<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('role', 'admin')->first();
        $role_support = Role::where('role', 'support')->first();

        $admin  = new User();
        $admin->name = 'Erhan';
        $admin->email = 'erhan.akin@live.nl';
        $admin->password = bcrypt('test1234');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $support = new User();
        $support->name = 'Supporter';
        $support->email = 'wahed.email@hotmail.com';
        $support->password = bcrypt('test1234');
        $support->save();
        $support->roles()->attach($role_support);
    }
}
