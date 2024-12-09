<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unique_id' => fake()->unique()->numerify('###'),
            'usertype' => fake()->randomElement(['student', 'faculty']),
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'middlename' => fake()->randomLetter(),
            'course' => fake()->randomElement(['BSIT', 'BSCS', 'BSIS']),
            'year' => fake()->numberBetween($min = 1950, $max = 2000),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'age' => fake()->numberBetween($min = 18, $max = 70),
            'year' => fake()->randomElement(['1st-Year', '2nd-Year', '3rd-Year', '4th-Year']),
            'department' => fake()->randomElement(['CCS', 'CBA', 'CAS']),
            'degree' => fake()->randomElement(['None', 'Degree Holder']),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}