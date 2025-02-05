<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'photo' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        $photoPath = $request->photo->store('photos');

        Author::create([
            'name' => $attributes['name'],
            'photo' => $photoPath,
        ]);

        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', [
            'author' => $author->load('books')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {

        $attributes = $request->validate([
            'name' => ['required'],
            'photo' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        // Check if a new cover image has been uploaded
        if ($request->hasFile('photo')) {
            $photoPath = $request->photo->store('photos');
        } else {
            $photoPath = $author->photo;
        }

        $author->update([
            'name' => $attributes['name'],
            'photo' => $photoPath,
        ]);

        return redirect('/authors/' . $author->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect('/authors');
    }
}
