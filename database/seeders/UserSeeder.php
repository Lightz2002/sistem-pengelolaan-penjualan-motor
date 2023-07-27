<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userVendor = new User();
        $userVendor->username = 'vendor1';
        $userVendor->email = 'vendor1@gmail.com';
        $userVendor->password = Hash::make('123');
        $userVendor->role = Role::where('name', 'vendor')->first()->id;
        $userVendor->save();

        $userSurveyor = new User();
        $userSurveyor->username = 'ariping';
        $userSurveyor->email = 'ariping@gmail.com';
        $userSurveyor->password = Hash::make('123');
        $userSurveyor->role = Role::where('name', 'surveyor')->first()->id;
        $userSurveyor->save();

        $userAdminData = new User();
        $userAdminData->username = 'admindata1';
        $userAdminData->email = 'admindata1@gmail.com';
        $userAdminData->password = Hash::make('123');
        $userAdminData->role = Role::where('name', 'admin data')->first()->id;
        $userAdminData->save();

        $userAdmin = new User();
        $userAdmin->username = 'admin1';
        $userAdmin->email = 'admin1@gmail.com';
        $userAdmin->password = Hash::make('123');
        $userAdmin->role = Role::where('name', 'admin')->first()->id;
        $userAdmin->save();

        $userCashier = new User();
        $userCashier->username = 'elika';
        $userCashier->email = 'elika@gmail.com';
        $userCashier->password = Hash::make('123');
        $userCashier->role = Role::where('name', 'cashier')->first()->id;
        $userCashier->save();
    }
}
