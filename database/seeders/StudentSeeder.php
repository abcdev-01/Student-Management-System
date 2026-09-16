<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Student::create([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'age' => $faker->numberBetween(18, 100),
                'course' => $faker->word(),
            ]);
        }
    }
}