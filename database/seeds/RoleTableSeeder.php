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
        $role_basic = new Role();
        $role_basic->name = 'basic';
        $role_basic->description = 'A Basic Role';
        $role_basic->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'A Admin Role';
        $role_admin->save();
    }
}
