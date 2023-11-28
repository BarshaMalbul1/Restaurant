<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_category_id' => 1,
            'name' => fake()->word,
            'price' => fake()->randomFloat(2,50,200),
            'image' => fake()->word,
            'description' => fake()->sentence,
        ];
    }
}
