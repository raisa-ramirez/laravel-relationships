<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // "url" => fake()->imageUrl()
            "url" => "https://prakashinfotech.com/wp-content/uploads/2022/11/laravel-banner.jpg"
        ];
    }
}
