<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image; 

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        Image::create([
            'title' => 'О нас',
            'path' => 'https://assets.hiltonstatic.com/hilton-asset-cache/image/upload/c_fill,w_1920,h_1080,q_70,f_auto,g_auto/Imagery/Renderings/Waldorf%20Astoria/M/MSQWAWA/4.png',
            'section' => 'about'
        ]);

        Image::create([
            'title' => 'Преимущества',
            'path' => 'https://images.unsplash.com/photo-1568495248636-6439e2d59f5e?auto=format&fit=crop&w=900&q=80',
            'section' => 'features'
        ]);

        Image::create([
            'title' => 'Команда',
            'path' => 'https://images.unsplash.com/photo-1508051123996-69f8caf4891e?auto=format&fit=crop&w=900&q=80',
            'section' => 'team'
        ]);
    }
}