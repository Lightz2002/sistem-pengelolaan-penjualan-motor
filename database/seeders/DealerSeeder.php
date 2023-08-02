<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dealers')->insert([
            ['name' => 'BMB 6'],
            ['name' => 'Gambir'],
            ['name' => 'Ganet'],
            ['name' => 'Global'],
            ['name' => 'SJM'],
            ['name' => 'Uban'],
            ['name' => 'Kawal'],
            ['name' => 'Kijang'],
            ['name' => 'Sumber Motor'],
            ['name' => 'Motorku'],
            ['name' => 'GSM'],
            ['name' => 'Dwi Makmur'],
            ['name' => 'Jaya Utama'],
            ['name' => 'Mega Abadi'],
            ['name' => 'Cosmos'],
            ['name' => 'Otto Trend'],
            ['name' => 'Rezeki'],
            ['name' => 'Utama'],
            ['name' => 'Mitra Mandiri'],
            ['name' => 'LIKO'],
            ['name' => 'Adjo Motor'],
            ['name' => 'Pahala Motor'],
            ['name' => 'MJM'],
            ['name' => 'Teo Jaya'],
            ['name' => 'Bandar Baru Motor'],
            ['name' => 'Sensasi Motor'],
            ['name' => 'Honda Pemuda'],
            ['name' => 'Prima Motor'],
            ['name' => 'ABS']
        ]);
    }
}
