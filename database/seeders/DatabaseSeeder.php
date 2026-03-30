<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    $this->call([
        UsersSeeder::class,
        HotelSeeder::class,
        HotelImageSeeder::class,
        BookingSeeder::class,
        CommentSeeder::class,
        AmenitySeeder::class,
        LikeSeeder::class,
    ]);
}
}