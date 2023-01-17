<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Create Roles
      $roleSuperAdmin = Role::create(['name' => 'superadmin']);
      $roleAdmin = Role::create(['name' => 'admin']);
      $roleEditor = Role::create(['name' => 'editor']);
      $roleUser = Role::create(['name' => 'user']);

    // permission list as array
    $permiss=[
        // dashboard
        'dashboard.vue',
        //Blog permission
        'blog.create',
        'blog.view',
        'blog.edit',
        'blog.delete',
        'blog.approve',
        //Admin permission
        'admin.create',
        'admin.view',
        'admin.edit',
        'admin.delete',
        'admin.approve',
        //Role permission
        'role.create',
        'role.view',
        'role.edit',
        'role.delete',
        'role.approve',
         //profile
         'profile.view',
         'profile.edit',
        
    ];
    //Create and Assign Permission
    // $permission = Permission::create(['name' => 'edit articles']);
      for($i=0;$i<count($permiss);$i++){
    $permission = Permission::create(['name' => $permiss[$i]]);
        
    $roleSuperAdmin->givePermissionTo($permission);
    $permission->assignRole($roleSuperAdmin);
      }
    }
}
