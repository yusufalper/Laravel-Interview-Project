<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'name' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10),
            'phone' => Str::random(10),
            'company_id' => 1,
        ]);
    }
}
