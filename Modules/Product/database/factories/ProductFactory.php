<?php

namespace Modules\Product\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Product\app\Models\Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->title(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->randomFloat(2, 4, 10),
            'views' => $this->faker->randomFloat(2, 15, 110),
            'is_active' => $this->faker->boolean,

        ];
    }
}

