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
                'name' => 'Отель Европа',
                'name_en' => 'Hotel Europe',
                'description' => 'Роскошный пятизвездочный отель в историческом центре Минска. Расположен в здании начала XX века после полной реставрации. Номера класса люкс, ресторан высокой кухни, спа-центр с бассейном, конференц-залы.',
                'description_en' => 'Luxurious five-star hotel in the historic center of Minsk. Housed in a fully restored early 20th-century building. Luxury rooms, fine dining restaurant, spa with pool, conference halls.',
                'city' => 'Минск',
                'city_en' => 'Minsk',
                'adress' => 'ул. Интернациональная, 28',
                'map_lat' => 53.9015,
                'map_lng' => 27.5567,
                'price_per_night' => 450,
                'stars' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Отель Виктория',
                'name_en' => 'Hotel Victoria',
                'description' => 'Престижный четырехзвездочный отель в центре Минска, рядом с Площадью Победы. Просторные номера с панорамным видом на город. Ресторан белорусской кухни, фитнес-центр, сауна.',
                'description_en' => 'Prestigious four-star hotel in the center of Minsk, near Victory Square. Spacious rooms with panoramic city views. Belarusian cuisine restaurant, fitness center, sauna.',
                'city' => 'Минск',
                'city_en' => 'Minsk',
                'adress' => 'пр-т Победителей, 59',
                'map_lat' => 53.9123,
                'map_lng' => 27.5812,
                'price_per_night' => 280,
                'stars' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Отель Минск',
                'name_en' => 'Hotel Minsk',
                'description' => 'Знаменитый отель с богатой историей, расположенный напротив Дома правительства. Панорамный ресторан на верхнем этаже с видом на Минск.',
                'description_en' => 'Famous hotel with rich history, located opposite the Government House. Panoramic restaurant on the top floor with views of Minsk.',
                'city' => 'Минск',
                'city_en' => 'Minsk',
                'adress' => 'ул. Сторожовская, 15',
                'map_lat' => 53.8967,
                'map_lng' => 27.5565,
                'price_per_night' => 200,
                'stars' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'DoubleTree by Hilton Minsk',
                'name_en' => 'DoubleTree by Hilton Minsk',
                'description' => 'Современный международный отель сети Hilton в Минске. Просторные номера, фитнес-центр, ресторан, бар на крыше.',
                'description_en' => 'Modern international Hilton hotel in Minsk. Spacious rooms, fitness center, restaurant, rooftop bar.',
                'city' => 'Минск',
                'city_en' => 'Minsk',
                'adress' => 'пр-т Победителей, 9',
                'map_lat' => 53.9089,
                'map_lng' => 27.5678,
                'price_per_night' => 350,
                'stars' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Отель Буг',
                'name_en' => 'Hotel Bug',
                'description' => 'Одна из самых известных гостиниц Минска, расположенная на площади Независимости. Уютные номера, ресторан, кафе.',
                'description_en' => 'One of the most famous hotels in Minsk, located on Independence Square. Cozy rooms, restaurant, cafe.',
                'city' => 'Минск',
                'city_en' => 'Minsk',
                'adress' => 'пл. Независимости, 11',
                'map_lat' => 53.9001,
                'map_lng' => 27.5556,
                'price_per_night' => 150,
                'stars' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Astoria Hotel',
                'name_en' => 'Astoria Hotel',
                'description' => 'Отель Astoria — современный и комфортный отель в центре Минска. Уютные номера, бесплатный Wi-Fi, ресторан с европейской кухней.',
                'description_en' => 'Astoria Hotel — modern and comfortable hotel in the center of Minsk. Cozy rooms, free Wi-Fi, restaurant with European cuisine.',
                'city' => 'Минск',
                'city_en' => 'Minsk',
                'adress' => 'ул. Кирова, 8',
                'map_lat' => 53.893,
                'map_lng' => 27.547,
                'price_per_night' => 120,
                'stars' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'name' => 'Эрмитаж Брест',
                'name_en' => 'Hermitage Brest',
                'description' => 'Уютный отель в историческом центре Бреста, недалеко от пешеходной улицы Советская. Комфортабельные номера, ресторан, сауна.',
                'description_en' => 'Cozy hotel in the historic center of Brest, near the pedestrian Sovetskaya street. Comfortable rooms, restaurant, sauna.',
                'city' => 'Брест',
                'city_en' => 'Brest',
                'adress' => 'ул. Гоголя, 7',
                'map_lat' => 52.0912,
                'map_lng' => 23.6891,
                'price_per_night' => 110,
                'stars' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'name' => 'Отель Крон',
                'name_en' => 'Hotel Kron',
                'description' => 'Современный отель в Гродно, расположенный на набережной реки Неман. Вид на старый город и замки.',
                'description_en' => 'Modern hotel in Grodno, located on the embankment of the Neman River. View of the old town and castles.',
                'city' => 'Гродно',
                'city_en' => 'Grodno',
                'adress' => 'ул. Советская, 8',
                'map_lat' => 53.6785,
                'map_lng' => 23.8283,
                'price_per_night' => 180,
                'stars' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Семашко',
                'name_en' => 'Semashko',
                'description' => 'Отель в историческом здании в центре Гродно, недалеко от Коложской церкви. Аутентичная атмосфера.',
                'description_en' => 'Hotel in a historic building in the center of Grodno, near the Kalozha Church. Authentic atmosphere.',
                'city' => 'Гродно',
                'city_en' => 'Grodno',
                'adress' => 'ул. Замковая, 2',
                'map_lat' => 53.6771,
                'map_lng' => 23.8265,
                'price_per_night' => 140,
                'stars' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
     ]);
    }
}