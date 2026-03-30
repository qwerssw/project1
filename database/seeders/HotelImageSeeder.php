<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelImageSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = DB::table('hotels')->pluck('id')->toArray();
        
        if (empty($hotels)) {
            $this->command->info('Нет отелей в базе данных. Сначала запустите HotelSeeder.');
            return;
        }
        
        $images = [];
        
        foreach ($hotels as $hotelId) {
            $images[] = [
                'hotel_id' => $hotelId,
                'image_path' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/377385464.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        
        DB::table('hotel_images')->insert($images);
        
        $this->command->info('Добавлено ' . count($images) . ' изображений для отелей.');
    }
}