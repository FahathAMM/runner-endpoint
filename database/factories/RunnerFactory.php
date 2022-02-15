<?php

namespace Database\Factories;

use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RunnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'race_id' => Race::all()->random()->id,
            'name'    => $this->faker->name(),
            'sex'     => $gender,
            'age'     => $this->faker->randomNumber(2),
            'color'   => $this->faker->colorName(),
        ];
    }
}
