<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $role = Role::all();
    if ($role->count()  <= 0) {
      foreach (['Superadmin', 'Admin'] as $key => $value) {
        $role = Role::create(['name' => $value]);
      }
    }

    $adminRole = Role::whereName('Superadmin')->first();
    $permissions = Permission::all();

    foreach ($permissions as $permission) {
      PermissionRole::updateOrCreate(['role_id' => $adminRole->id, 'permission_id' => $permission->id]);
    }
  }
}
