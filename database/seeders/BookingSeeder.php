<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
public function run()
{
DB::table('bookings')->insert([
[
'user_id'=>1,
'hotel_id'=>1,
'check_in'=>'2026-05-01',
'check_out'=>'2026-05-05',
'total_price'=>800,
'status'=>'confirmed',
'created_at'=>now(),
'updated_at'=>now()
]
]);
}
}
