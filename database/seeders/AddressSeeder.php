<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'latitude' => "41.0137178958",
            'longitude' => "28.9554797258",
            'company_id' => 1
        ]);

        DB::table('addresses')->insert([
            'latitude' => "41.3137178958",
            'longitude' => "29.2554797258",
            'company_id' => 2
        ]);
    }
}
