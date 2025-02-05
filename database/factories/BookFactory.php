<?php

namespace Database\Factories;

use App\Models\Editor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'name' => fake()->randomElement([
                'The Great Adventure',
                'Echoes of Silence',
                'The Forgotten Land',
                'Whispers in the Dark',
                'Through the Endless Sea',
            ]),
            'bibliography' => fake()->paragraph(),
            'cover_image' => 'covers/cover-default.jpg',
            'price' => fake()->randomFloat(2, 5, 50),

        ];
    }
}
