<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusesSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'name' => 'good',
            ],
            [
                'name' => 'damaged',
            ],
            [
                'name' => 'available',
            ],
            [
                'name' => 'borrowed',
            ],
            [
                'name' => 'lost',
            ],

        ]);
    }
}
