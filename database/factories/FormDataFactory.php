<?php

namespace Database\Factories;

use App\Models\Runner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FormDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['car', 'bike']);

        return [
            'runner_id'    => Runner::all()->random()->id,
            'vehicle_no'   => $this->faker->randomNumber(3),
            'vehicle_type' => $type,
        ];
    }
}
