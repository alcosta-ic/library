<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sortColumn = request('sort_by', 'id'); // order by id
        $sortOrder = request('sort_order', 'desc');

//        return view('books.index', [
//            'books' => Book::with('authors')->orderBy('id', 'desc')->get(),
//            'authors' => Author::all(),
//            'editors' => Editor::all(),
//        ]);
        return view('books.index', [
            'books' => Book::with('authors')->orderBy($sortColumn, $sortOrder)->get(),
            'authors' => Author::all(),
            'editors' => Editor::all(),
            'sortColumn' => $sortColumn,
            'sortOrder' => $sortOrder
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', [
            'authors' => Author::all(),
            'editors' => Editor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation data from book
        $attributes = $request->validate([
            'isbn' => ['required', 'unique:books,isbn'],
            'name' => ['required'],
            'editor_id' => ['required', 'exists:editors,id'],
            'bibliography' => ['required'],
            'cover_image' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        // Validation data from authors
        $authors = $request->validate([
            'authors' => ['nullable', 'array'],
            'authors.*' => ['exists:authors,id'],
        ]);

        $logoPath = $request->cover_image->store('covers');

        $book = Book::create([
            'isbn' => $attributes['isbn'],
            'name' => $attributes['name'],
            'editor_id' => $attributes['editor_id'],
            'bibliography' => $attributes['bibliography'],
            'cover_image' => $logoPath,
            'price' => $attributes['price'],
        ]);

        // Add authors to book
        if (!empty($authors['authors'])) {
            $book->authors()->attach($authors['authors']);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'authors' => Author::all(),
            'editors' => Editor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Validation
        $attributes = $request->validate([
            'isbn' => ['nullable', Rule::unique('books')->ignore($book->id, 'id')],
            'name' => ['required'],
            'editor_id' => ['required', 'exists:editors,id'],
            'bibliography' => ['required'],
            'cover_image' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'webp'])],
//          'cover_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        // Validation for authors
        $authors = $request->validate([
            'authors' => ['nullable', 'array'],
            'authors.*' => ['exists:authors,id'],
        ]);

        // Check if a new cover image has been uploaded
        if ($request->hasFile('cover_image')) {
            $logoPath = $request->cover_image->store('covers');
        } else {
            $logoPath = $book->cover_image;
        }

        // Update book data
        $book->update([
//           'isbn' => $attributes['isbn'],
            'name' => $attributes['name'],
            'editor_id' => $attributes['editor_id'],
            'bibliography' => $attributes['bibliography'],
            'cover_image' => $logoPath,
            'price' => $attributes['price'],
        ]);

        //Only update the ISBN if it is different
        if ($book->isbn !== $attributes['isbn']) {
            $updateData['isbn'] = $attributes['isbn'];
        }

        // Updates the authors associated with the book
        $book->authors()->sync($authors['authors'] ?? []);

        return redirect('/books/' . $book->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
