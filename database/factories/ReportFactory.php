<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'number' => $faker->numerify('aaa-###'),
            'description' => $faker->paragraph,
            'created_at' => $faker->dataTimeBetween('-1 week', 'now'),
            'status_id' => 1
        ];
    }
}
