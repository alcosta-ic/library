<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Editor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editors = Editor::all();
        $authors = Author::all();

        Book::factory(20)->create()->each(function ($book) use ($editors, $authors) {

            $book->editor()->associate($editors->random());
            $book->save();
            $book->authors()->attach(
                $authors->random(rand(1, 3)));
        });
    }
}
