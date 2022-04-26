<?php

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissionGroups = [
            [
                'name' => 'Todo'
            ],
            [
                'name' => 'User'
            ],
            [
                'name' => 'Category'
            ],
            [
                'name' => 'Product'
            ],
            [
                'name' => 'Product Type'
            ],
            [
                'name' => 'Role'
            ]
        ];
        foreach ($permissionGroups as $key => $value) {
            $permissionGroup       = new PermissionGroup;
            $permissionGroup->name = $value['name'];
            $permissionGroup->save();
        }
    }
}
