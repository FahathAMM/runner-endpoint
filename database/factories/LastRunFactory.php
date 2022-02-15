<?php

namespace Database\Factories;

use App\Models\Runner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LastRun>
 */
class LastRunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'runner_id' => Runner::all()->random()->id,
            'last_race' => $this->faker->date(),
            'location'  => $this->faker->city(),
        ];
    }
}
