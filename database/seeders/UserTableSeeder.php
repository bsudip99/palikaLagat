<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $branch = Branch::create(['province' => 'Koshi', 'district' => 'Sankhuwashava', 'palika' => 'Makalu']);
    $user = User::create(array_merge(config('constant.superAdminCredentials'), ['password' => bcrypt('Password@123'),'branch_id' => $branch->id]));
    $role = Role::whereName('Superadmin')->first();
    RoleUser::create([
      'user_id' => $user->id,
      'role_id' => $role->id
    ]);
  }
}
