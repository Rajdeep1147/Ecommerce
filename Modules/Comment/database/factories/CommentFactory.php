<?php

namespace Modules\Comment\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'Product_id'=> 1,
            'user_id'=> 1,
            'body' => $this->faker->text(),
            'is_active' =>$this->faker->boolean,

        ];
    }
}

