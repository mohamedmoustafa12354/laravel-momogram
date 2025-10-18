<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(),
            'slug' => fake()->regexify('[a-z0-9-]{10}'),
            'likes' => fake()->numberBetween(0, 100),
            'user_id' => \App\Models\User::factory(),
            'image' => 'https://picsum.photos/seed/' . fake()->unique()->numberBetween(1, 1000) . '/600/400',
        ];
    }
}
