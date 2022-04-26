<?php

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            [
                'name'                => 'Todo Create',
                'permission_group_id' => PermissionGroup::where('name', 'Todo')->first()->id
            ],
            [
                'name'                => 'Todo Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Todo')->first()->id
            ],
            [
                'name'                => 'Todo List',
                'permission_group_id' => PermissionGroup::where('name', 'Todo')->first()->id

            ],
            [
                'name'                => 'Todo Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Todo')->first()->id
            ],
            [
                'name'                => 'User Create',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id

            ],
            [
                'name'                => 'User Edit',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id

            ],
            [
                'name'                => 'User List',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id

            ],
            [
                'name'                => 'User Delete',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id

            ],
            [
                'name'                => 'Category Create',
                'permission_group_id' => PermissionGroup::where('name', 'Category')->first()->id

            ],
            [
                'name'                => 'Category Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Category')->first()->id

            ],
            [
                'name'                => 'Category List',
                'permission_group_id' => PermissionGroup::where('name', 'Category')->first()->id

            ],
            [
                'name'                => 'Category Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Category')->first()->id

            ], [
                'name'                => 'Product Create',
                'permission_group_id' => PermissionGroup::where('name', 'Product')->first()->id

            ],
            [
                'name'                => 'Product Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Product')->first()->id

            ],
            [
                'name'                => 'Product List',
                'permission_group_id' => PermissionGroup::where('name', 'Product')->first()->id

            ],
            [
                'name'                => 'Product Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Product')->first()->id

            ], [
                'name'                => 'Product Type Create',
                'permission_group_id' => PermissionGroup::where('name', 'Product Type')->first()->id

            ],
            [
                'name'                => 'Product Type Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Product Type')->first()->id

            ],
            [
                'name'                => 'Product Type List',
                'permission_group_id' => PermissionGroup::where('name', 'Product Type')->first()->id

            ],
            [
                'name'                => 'Product Type Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Product Type')->first()->id

            ], [
                'name'                => 'Role Create',
                'permission_group_id' => PermissionGroup::where('name', 'Role')->first()->id

            ],
            [
                'name'                => 'Role Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Role')->first()->id

            ],
            [
                'name'                => 'Role List',
                'permission_group_id' => PermissionGroup::where('name', 'Role')->first()->id

            ],
            [
                'name'                => 'Role Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Role')->first()->id

            ]
        ];
        foreach ($permissions as $key => $value) {
            $permission                      = new Permission;
            $permission->name                = $value['name'];
            $permission->permission_group_id = $value['permission_group_id'];
            $permission->save();
        }
    }
}
