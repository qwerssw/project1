<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelImageSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = DB::table('hotels')->get();
        $images = [];
//php artisan migrate:fresh --seed
        foreach ($hotels as $hotel) {
            switch ($hotel->name) {
                case 'Отель Европа':
                    $photos = [
                        'https://www.m.hoteleurope.by/upload/resize_cache/iblock/bcd/580_387_2/2g8agv4edaa7hq2ov0wneu549ofgqto4.JPG',
                        'https://www.m.hoteleurope.by/upload/resize_cache/iblock/28a/580_400_2/28a45c0611c408e09f24a0943712259b.jpg',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYemfJ46511vRxm6yvktUpNP4Yr5eEs2xuMw&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEXgLxKzESkw8RDqR7odk3_UNBAH7ZyLwi-Q&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzIgUZp8Cd8xfbt8fCsbKeTktegJW2HV8RJA&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGLbHEahfKGD8-JojSuGdhVw_rt_EmXpOjOA&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZhe8qf2AFeeqVWo6nPJwn7x3ju83f2e3K_A&s',
                    ];
                    break;

                case 'DoubleTree by Hilton Minsk':
                    $photos = [
                        'https://dtminsk.by/wp-content/uploads/2022/04/Ember-May-2-1.jpg',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2fx33VXcJpoO3t5a_7ikQkZsg3LJmzzh77A&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl53MK2xECj-84LjGg369S24EsDAp9NG5yng&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEgoyWa4dHjpsp1ifsJ3RkHGy2m7Zbfh-9Gg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8QcF1v7s_8a3NVN2nLnEfPvo81wAx5a9Tlg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOdDcelmYPG6H6YM6c80YPSlHVLQISojgxRw&s',
                    ];
                    break;

                case 'Отель Виктория':
                    $photos = [
                        'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/ef/56/5f/caption.jpg?w=900&h=500&s=1',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMXpWUKJMVmVTy9cX6CB3YQwIgp8T4JK5cXA&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDOQ2iyobjfh_OI5r_HeFhDLSgPIC0EBmlBw&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmrEPVTcpxlnU70VHdEnQjpZFlPkAxe2c4Jw&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI0e5s_Jrbylra3H6nyDWnttrcHoEk8MjMBw&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn8GQ1H96pGiB_hfX77-rLsWyy6O0fc4MsYw&s', 
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSctW2w1KmL5M-_TPm2mw8R36BETqqtbnzmHw&s',
                                       ];
                    break;

                case 'Отель Минск':
                    $photos = [
                        'https://welcome.by/uploads/images/hotels/slider/812995_hotel-minsk-facade-3942.jpg',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6EzJ2KEEr4Bqe6GuLgTAnt5-IjeWhZ1z2-Q&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRL8pjJHUi3o49NZopcCYuRe5e3ElTPATRe-Q&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHySTOl-1wiHHHH34Y1384YWwC0SXH3I2lqg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1ivRC9CgNz2jetq2VEECh8LLVajpQ0Wz9lg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzsbcLZZ2Nd9kTLr0Nu3T8y4NcBzZa42BKLg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuMZTnjCHse7rlRbwZ8uHSfq0rjLlPyUz5mw&s',
                    ];
                    break;
                default:
                    $photos = [
                        'https://images.unsplash.com/photo-1501117716987-c8e8f3bb0c13',
                        'https://images.unsplash.com/photo-1560347876-aeef00ee58a1',
                        'https://images.unsplash.com/photo-1566073771259-6a8506099945',
                        'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa',
                        'https://images.unsplash.com/photo-1611892440504-42a792e24d32',
                    ];
                    break;
            }

            foreach ($photos as $photo) {
                $images[] = [
                    'hotel_id' => $hotel->id,
                    'image_path' => $photo,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('hotel_images')->insert($images);
    }
}