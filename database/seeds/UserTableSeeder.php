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
        $role_admin  = Role::where('name', 'admin')->first();

 
        $admin = new User();
        $admin->fname = 'Thien';
        $admin->lname = 'Nguyen';
        $admin->gender = 'male';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);
 
    }
}
