<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'thumb_url' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1000, 10000)
        ];
    }
}
