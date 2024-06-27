<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Call your custom seeders here
        $this->call([
            StudentsSeeder::class,
            BooksSeeder::class,
            StatusesSeeder::class,
            CopiesSeeder::class,
        ]);

    }
}
