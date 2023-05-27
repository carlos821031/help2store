<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(30),
            'description' => $this->faker->text(250),
            'code' => $this->faker->randomNumber(8),
            'stock' => 0, //$this->faker->numberBetween(0,400),
            'image' => null,
            'quantity_min' => $this->faker->numberBetween(20,40),
            'quantity_max' => $this->faker->numberBetween(100,150),
            'sales' => $this->faker->randomFloat(8,1,9),
            'price' => $this->faker->randomFloat(8,10,20),
        ];
    }
}
