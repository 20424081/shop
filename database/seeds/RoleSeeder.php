<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

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
        $role = new Role;
        $role->name = 'Super Admin';
        $role->save();

        $permissions = Permission::get();

        foreach ($permissions as $key => $value) {
            $role->givePermissionTo($value->name);
        }
    }
}
