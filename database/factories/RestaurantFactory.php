<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3,true),
            'tables' => $this->faker->unique()->numberBetween(10,50),
            'guest_capacity' => $this->faker->unique()->numberBetween(20,300),
        ];
    }
}
