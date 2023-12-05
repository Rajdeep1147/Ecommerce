<?php

namespace Modules\Comment\database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\app\Models\Product;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Comment\app\Models\Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Product_id'=> Product::all()->random()->id,
            'user_id'=> User::all()->random()->id,
            'body' => $this->faker->text(),
            'is_active' =>$this->faker->boolean,

        ];
    }
}

