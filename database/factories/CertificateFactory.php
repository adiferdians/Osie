<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->text(8),
            'title' => $this->faker->text(5),
            'sub_title' => $this->faker->text(5),
            'address' => $this->faker->paragraph(),
            'scope' => $this->faker->paragraph(),
            'number' => $this->faker->randomNumber(7, true),
            'number_convert' => $this->faker->randomNumber(7, true),
            'effective' => $this->faker->date(),
            'expired' => $this->faker->date(),
            'date' => $this->faker->date(),
            'status' => $this->faker->text(),
            'iso' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
