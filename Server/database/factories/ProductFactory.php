<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
        $categories = Category::pluck('id')->toArray();
        $adminUsers = User::where('role', 'administrator')->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence,
            'summary' => $this->faker->paragraph,
            'description' => $this->faker->paragraphs(3, true),
            'stock' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'sale_price' => $this->faker->randomFloat(2, 0, 500), 
            'slug' => $this->faker->slug,
            'rating' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'category_id' => $this->faker->randomElement($categories),
            'user_id' => $this->faker->randomElement($adminUsers),
            'show_in_homepage' => $this->faker->randomElement(['show', 'hide']),
        ];
    }
}
