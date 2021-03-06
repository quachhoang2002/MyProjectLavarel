<?php

namespace Database\Seeders;

use App\Models\course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        course::factory(5)->create();
        Student::factory(100)->create();
    }
}
