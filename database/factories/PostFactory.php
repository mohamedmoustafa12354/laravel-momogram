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
        // 🟢 1. تحديد المجلد اللي فيه الصور
        $imagePath = public_path('images');  

        // 🟢 2. جلب كل الصور داخل المجلد (jpg / png / jpeg)
        $images = glob($imagePath . '/*.{jpg,jpeg,png}', GLOB_BRACE);

        // 🟢 3. اختيار صورة عشوائية
        $randomImage = basename($images[array_rand($images)]);

        return [
            'description' => fake()->sentence(),
            'slug' => fake()->regexify('[a-z0-9-]{10}'),
            'likes' => fake()->numberBetween(0, 100),
            'user_id' => \App\Models\User::factory(),
            // 🟢 4. المسار الظاهر للمستخدم (يبدأ من public/)
            'image' => 'images/' . $randomImage,
        ];
    }
}
