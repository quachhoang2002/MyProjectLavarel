<?php

namespace Database\Factories;

use App\Enums\StudentStatusE;
use App\Models\course;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'gender'=>$this->faker->boolean(),
            'birthday' =>$this->faker->dateTimeBetween('-30 years','-18 years'),
            'status'=>$this->faker->randomElement(StudentStatusE::arrayStatus()),
            'description'=>$this->faker->text(),
            'course_id'=>course::query()->inRandomOrder()->value('id'),
        ];
    }
}
