<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = new Role();
        $role1->name = 'cashier';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'surveyor';
        $role2->save();

        $role3 = new Role();
        $role3->name = 'admin data';
        $role3->save();

        $role4 = new Role();
        $role4->name = 'admin';
        $role4->save();

        $role5 = new Role();
        $role5->name = 'vendor';
        $role5->save();
    }
}
