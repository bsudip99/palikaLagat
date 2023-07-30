<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionModule;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $permission_modules = [
      'Role' => ['role-list', 'role-create', 'role-edit', 'role-delete'],
      'User' => ['user-list', 'user-create', 'user-edit', 'user-delete', 'user-detail']
    ];

    foreach ($permission_modules as $key => $permissions) {
      $permission_module = PermissionModule::updateOrCreate(['name' => $key]);
      foreach ($permissions as $permission) {
        Permission::updateOrCreate(['permission_module_id' => $permission_module->id, 'name' => $permission]);
      }
    }
  }
}
