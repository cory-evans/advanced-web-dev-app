<?php

namespace Database\Factories\Shop;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShopProduct>
 */
class ShopProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'price_cents' => $this->faker->numberBetween(100, 100000),
            'is_featured' => $this->faker->optional($weight = 0.5, $default = false)->randomDigit(),
        ];
    }
}
