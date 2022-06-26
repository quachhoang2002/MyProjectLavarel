<?php

namespace Database\Seeders;

use App\Models\course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        course::factory(5)->create();
        Student::factory(100)->create();
    }
}
