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
                case 'Astoria Hotel':
                    $photos = [
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfZbpss7EA2evIkJIsMP9sqXtxrr-EWKIHew&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlNodvjJdFlj7P3ujBne9Duf3dz6Kgc3TUAg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJBl5pKDpGbfKLFz6LeBZGDYzxH0G6IDwPJg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq4hjBzCtOuAW3_NUgauwSQcjwsz3w4NelTg&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSM9cXb-w_6vdCcMuZu9fYZ9ESjd2x4ZWII0w&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUOgrY-IH8NbQyo4s38WOMHlV7jwvhADBCdA&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN-fubkIipj0q8PI2drqe_2yp6J5hKCd0p7A&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMY7ZIZBKaEnASYL5eK1DQu25ay1eYEuJvZg&s',
                    ];
                    break;
                case 'Гостиница Беларусь':
                    $photos = [
                        'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0d/e9/cc/52/caption.jpg?w=500&h=-1&s=1',
                        'https://avatars.mds.yandex.net/get-sprav-products/17763327/2a0000019b8e7eea660f25fff1e4c256fa66/S_height',
                        'https://cdn.gosport.by/catalog/100041411/_sized/86%20(1)_665x500.jpg',
                        'https://avatars.mds.yandex.net/get-altay/236825/2a0000015da8c43e3dace8c907e071594747/L_height',
                        'https://uploads2.stells.info/MUYMZeFRKKg3_eZ-eXu3QbPsaQ0=/952x600/jpg/a/15/a15f9e957a7486d966ca253a38e84b0e.jpg',
                        'https://www.hotel-belarus.com/upload/resize_cache/iblock/6f0/22mv228r3qag9jfo0txma69a3csz5z6g/570_310_2/5.jpg',
                    ];
                    break;
                case 'Отель Буг':
                    $photos = [
                        'https://s.101hotelscdn.ru/uploads/image/hotel_image/655003/1794708.jpg',
                        'https://cdn.worldota.net/t/1024x768/extranet/43/0a/430aa5277c2d0930955bbb1fc9a831abed00fae9.jpeg',
                        'https://img.broni.travel/public/sites/pages/5871/1380974.jpeg',
                        'https://media-cdn.tripadvisor.com/media/photo-s/0d/97/62/5d/caption.jpg',
                        'https://img.cdn.level.travel/hotels/9106929/168ff16e922364a62028dadf4448068b.jpg',
                        'https://avatars.mds.yandex.net/get-altay/16749408/2a00000197ea658f631b37d458fed073e7db/orig',
                        'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/b8/f2/87/caption.jpg?w=900&h=-1&s=1',
                        'https://s.101hotelscdn.ru/uploads/image/hotel_image/655003/1794725.jpg',
                    ];
                    break;
                case 'Эрмитаж Брест':
                    $photos = [
                        'https://welcome.by/uploads/images/hotels/slider/771523_hotel-hermitage-brest-facade-4883.jpg',
                        'https://bestbelarus.by/upload/resize_cache/iblock/c12/0_510_2/iu1dte37gjzc3s4bi77pu8q6cn0h4niw.png',
                        'https://s.101hotelscdn.ru/uploads/image/hotel_image/3915/1483477.jpg',
                        'https://hermitagehotel.by/upload/resize_cache/iblock/d61/985_545_0/wqf9r3e1g422knplpxuyf9qf4exmkpyu.jpeg',
                        'https://clever.by/source/photos/2017/02/10/iren-photo-247.jpg',
                        'https://welcome-belarus.ru/wp-content/uploads/2018/08/Brest_gost_ermitag17.jpg',
                        'https://hermitagehotel.by/upload/resize_cache/iblock/135/985_545_0/010ftwa3m0qwn3a42qadkb1ftrmbr0g2.jpeg',
                    ];
                    break;
                case 'Семашко':
                    $photos = [
                        'https://cdn.worldota.net/t/1024x768/extranet/1e/bc/1ebcbd0180d2e38bdf5d31288a8581dcef357cea.jpeg',
                        'https://hotelsemashko.by/images/mainpage/lux3.jpg',
                        'https://hotelsemashko.by/images/New/003.jpg',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVTicu2pAuqWpJ_6qKYIVcKZrGY_OyuSZkFA&s',
                        'https://ir.ozone.ru/s3/hotels-widget-api/t/1024x768/extranet/c6/d2/f500/c6d2990af84b12d76f6be29f82c04487ca0c4f9d.jpeg',
                        'https://welcome-belarus.ru/wp-content/uploads/2018/08/Brest_gost_ermitag17.jpg',
                        'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/27/19/05/d1/apart-hotel-semashko.jpg?w=1100&h=1100&s=1',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTBqHeCi1dfT1hMl8q0MF8mAbVpVrgbmIAMQ&s',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxdz4N7cyWsL498zSQ7dDFQn4bhtwGgEe_fw&s',
                    ];
                    break;
                case 'Отель Крон':
                    $photos = [
                        'https://s.101hotelscdn.ru/uploads/image/hotel_image/4654/1494097.jpg',
                        'https://kronon.by/assets/components/phpthumbof/cache/num_1.42f775384c3d141cc9150497e6caa1975.jpg',
                        'https://www.holiday.by/files/houses/thumbnails/houses_gallery_fullsize/91ea6c5152295e342b9ab7bac5d7b89e.jpg',
                        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfwLMqSj9keHoNczCXduKLE6BvOGW_gYTovA&s',
                        'https://img.cdn.level.travel/hotels/9074702/846c34e3444f4a1853736f088a1d801d.jpg',
                        'https://www.holiday.by/files/houses/thumbnails/houses_gallery_fullsize/91ea6c5152295e342b9ab7bac5d7b89e.jpg',
                        'https://bestbelarus.by/upload/resize_cache/iblock/d5b/0_510_2/bv1u0f596v7g1lgwbuw22hfx5df9hi2h.jpg',
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