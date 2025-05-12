<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Space>
 */
class SpaceFactory extends Factory
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
            'category_id' => \App\Models\Category::inRandomOrder() -> first() ->id ?? 1,
            'name' => $this->faker->company . ' Space',
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'images' => json_encode([$this->faker->imageUrl()]),
            'price_per_hour' => $this->faker->randomFloat(2, 10, 200),
            'from_datetime' => $from,
            'to_datetime' => $to,
        ];
    }
}
