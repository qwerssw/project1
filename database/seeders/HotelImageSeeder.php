<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_images')->insert([
            [
                'hotel_id' => 3,
                'image_path' => '"D:\17-960x695.png"',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);
    }
}
