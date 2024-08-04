<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'product-list',
           'product-create',
           'product-edit',
           'product-delete',

           'team-list',
           'team-create',
           'team-edit',
           'team-delete',

           'previosWork-list',
           'previosWork-create',
           'previosWork-edit',
           'previosWork-delete',

           'catalog-list',
           'catalog-create',
           'catalog-edit',
           'catalog-delete',

           'slidbar-list',
           'slidbar-create',
           'slidbar-edit',
           'slidbar-delete',

           'message-list',
           'message-create',
           'message-edit',
           'message-delete',

           'department-list',
           'department-create',
           'department-edit',
           'department-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'comment-list',
           'comment-create',
           'comment-edit',
           'comment-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
