<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMetaData>
 */
class UserMetaDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Certifique-se de que o modelo User tenha um Factory definido
            'phone' => $this->faker->phoneNumber,
            'cpf' => $this->faker->unique()->numerify('###########'),
        ];
    }
}
