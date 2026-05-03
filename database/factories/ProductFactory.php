<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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

        $productName = ucwords($this->faker->words(2, true));
        return [
            'productName' => $productName,
            'price' => fake()->randomFloat(0,9)*10,
            'slug' => Str::slug($productName, '-'),
            'categoryID'=> 'P001',
            'stock' => fake()->randomFloat(0,0,100),

        ];
    }
}
