<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CopiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('copies')->insert([
            [
                'book_id' => 1,
                'status_id' => 1,
            ],
            [
                'book_id' => 2,
                'status_id' => 1,
            ],
            [
                'book_id' => 1,
                'status_id' => 1,
            ],

        ]);
    }
}
