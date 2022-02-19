<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AdminUser;

class HintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(),
            'model' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'type' => $this->faker->randomElement(['car','truck','motorcycle']),
            'version' => $this->faker->semver(),
            'admin_user_id' => AdminUser::factory()

        ];
    }
}
