<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class playersFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'registryDate' => now(),
            'lastSignIn' => now(),
            'score' => fake()->numberBetween(0,1000),
            'day' => fake()->numberBetween(0,28),
            'month' => fake()->numberBetween(0,12),
            'year' => fake()->numberBetween(1998,2023),
            'online' => fake()->boolean(50),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
}
