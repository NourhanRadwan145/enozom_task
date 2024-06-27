<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            [
                'student_number' => '1',
                'name' => 'Ali',
                'email' => 'ali@enozom.com',
                'phone' => '0122224400',
            ],
            [
                'student_number' => '2',
                'name' => 'Mohamed',
                'email' => 'mohamed@enozom.com',
                'phone' => '0111155000',
            ],
            [
                'student_number' => '3',
                'name' => 'Ahmed',
                'email' => 'ahmed@enozom.com',
                'phone' => '0155553311',
            ],
            
        ]);
    }
}
