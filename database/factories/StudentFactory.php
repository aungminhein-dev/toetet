<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_name'=> $this->faker->name(),
            'birthday'=> $this->faker->unixTime(),
            'admission_id'=> random_int(100000,999999),
            'father_name'=>Str::random(10),
            'mother_name'=>Str::random(10),
            'mother_nrc'=>Str::random(10),
            'father_nrc'=>Str::random(10),
            'siblings'=>Str::random(10),
            'grade'=> random_int(0,9),
            'address'=> $this->faker->state(),
            'parent_code'=> random_int(100000,999999),
            'phone'=> random_int(100000,999999),
            'image'=> '',
            'gender'=>$this->faker->title($gender = 'male'|'female'),
            'new_status_expiry'=>Carbon::now()->addYear()
        ];
    }
}
