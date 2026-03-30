<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotels')->insert([
[
    'name' => 'Astoria Hotel',
    'description' => 'Отель Astoria — это современный и комфортный отель в центре Минска, идеально подходящий как для туристов, так и для деловых поездок. Гостям предлагаются уютные номера с современным дизайном, бесплатный Wi-Fi, ресторан с европейской кухней и удобное расположение рядом с главными достопримечательностями города. Отличный сервис и приятная атмосфера делают проживание максимально комфортным.',
    'city' => 'Minsk',
    'adress' => 'ул. Кирова, 8',
    'map_lat' => 53.893,
    'map_lng' => 27.547,
    'price_per_night' => 120,
    'stars' => 4,
    'created_at' => now(),
    'updated_at' => now()
]
        ]);
    }
}