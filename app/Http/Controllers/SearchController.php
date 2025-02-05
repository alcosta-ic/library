<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
       $query = request('q');

       $books = Book::query()
            ->with(['editor', 'authors'])
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('isbn', 'LIKE', "%{$query}%")
            ->orWhereHas('editor', function ($q) use ($query) {
               $q->where('name', 'LIKE', "%{$query}%");  // search for editor name
            })
            ->orWhereHas('authors', function ($q) use ($query) {
               $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();

        return view('results', ['books' => $books]);
    }
}
