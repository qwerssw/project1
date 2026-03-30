<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    public function run()
    {
        DB::table('amenities')->insert([
            ['name' => 'WiFi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Бассейн', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Парковка', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Спа-центр', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ресторан', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Фитнес', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}