<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $cashierRole = Role::create(['name' => 'cashier']);
    $surveyorRole = Role::create(['name' => 'surveyor']);
    $adminDataRole = Role::create(['name' => 'admin data']);
    $adminRole = Role::create(['name' => 'admin']);
    $vendorRole = Role::create(['name' => 'vendor']);

    $manageUser = Permission::create(['name' => 'manage user']);

    $vendorRole->syncPermissions($manageUser);
  }
}
