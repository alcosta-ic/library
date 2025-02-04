<?php

namespace Database\Factories;

use App\Models\Editor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'editor_id' => Editor::factory(),
            'isbn' => fake()->isbn13(),
            'name' => fake()->words(3, true),
            'bibliography' => fake()->paragraph(),
            'cover_image' => fake()->imageUrl(200,300, 'books'),
            'price' => fake()->randomFloat(2, 5, 50),

        ];
    }
}
