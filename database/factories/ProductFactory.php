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
            //

            'product_name' => fake()->word(),
            'supplier_id' => fake()->numberBetween($min = 1, $max = 7),
            'category_id' => fake()->numberBetween($min = 1, $max = 16),
            'brand_id' => fake()->numberBetween($min = 1, $max = 25),
            'barcode' => fake()->isbn13(),
            'unit_price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 1000),
            'unit_in_stock' => fake()->numberBetween($min = 1, $max = 500)
        ];
    }
}
