<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    public function run()
{
DB::table('amenities')->insert([
['name'=>'WiFi'],
['name'=>'Pool'],
['name'=>'Parking']
]);
}
}
