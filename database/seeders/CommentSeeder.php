<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
{
DB::table('comments')->insert([
[
'user_id'=>1,
'hotel_id'=>1,
'comment'=>'Хороший отель',
'rating'=>5,
'created_at'=>now(),
'updated_at'=>now()
]
]);
}
}
