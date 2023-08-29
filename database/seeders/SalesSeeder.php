<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'customer_name' => 'Ariping',
                'sales_code' => 'JK0001',
                'sales_status' => 'pending',
                'customer_family_card_no' => '2172013009020002',
                'customer_identity_card_no' => '2172013009020003',
                'customer_full_address' => 'Victory Residence blok f.15',
                'sales_surveyor' => 2,
                'motor_type' => 'Scoopy',
                'motor_plate_number' => '2079',
                'sales_type' => 'Reinstallment',
                'motor_dp' => 5000000,
                'motor_price' => 1900000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
