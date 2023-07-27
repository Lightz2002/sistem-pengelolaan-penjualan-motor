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
        $userVendor->assignRole('vendor');
        $userVendor->save();

        $userSurveyor = new User();
        $userSurveyor->username = 'ariping';
        $userSurveyor->email = 'ariping@gmail.com';
        $userSurveyor->password = Hash::make('123');
        $userSurveyor->assignRole('surveyor');
        $userSurveyor->save();

        $userAdminData = new User();
        $userAdminData->username = 'admindata1';
        $userAdminData->email = 'admindata1@gmail.com';
        $userAdminData->password = Hash::make('123');
        $userAdminData->assignRole('admin data');
        $userAdminData->save();

        $userAdmin = new User();
        $userAdmin->username = 'admin1';
        $userAdmin->email = 'admin1@gmail.com';
        $userAdmin->password = Hash::make('123');
        $userAdmin->assignRole('admin');
        $userAdmin->save();

        $userCashier = new User();
        $userCashier->username = 'elika';
        $userCashier->email = 'elika@gmail.com';
        $userCashier->password = Hash::make('123');
        $userCashier->assignRole('cashier');
        $userCashier->save();
    }
}
