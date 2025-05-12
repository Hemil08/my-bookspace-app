<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        $from = $this->faker->dateTimeBetween('now', '+1 month');
        $to = (clone $from)->modify('+4 hours');

        return [
            'user_id' => \App\Models\User::factory(),
            'space_id' => \App\Models\Space::factory(),
            'from_datetime' => $from,
            'to_datetime' => $to,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'total_price' => $this->faker->randomFloat(2, 20, 500), 
        ];
    }
}
