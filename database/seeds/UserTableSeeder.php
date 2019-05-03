<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_basic = Role::where('name', 'basic')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'user name';
        $user->email = 'user@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_basic);
 
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'laotienoi2804@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);
 
    }
}
