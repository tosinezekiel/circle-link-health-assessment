<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\BloodPressureReading;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodPressureReadingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodPressureReading::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $comparison = $this->faker->randomElement(['or', 'and']);
        return [
            'upper' => rand(1, 300),
            'lower' => rand(1, 300),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
