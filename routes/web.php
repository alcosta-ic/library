<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create'])->middleware('auth');
Route::post('/books', [BookController::class, 'store'])->middleware('auth');
Route::get('/books/{book}', [BookController::class, 'show']);
Route::get('/books/{book}/edit', [BookController::class, 'edit'])
    ->middleware('auth');
Route::patch('/books/{book}', [BookController::class, 'update'])
    ->middleware('auth');
Route::delete('/books/{book}', [BookController::class, 'destroy'])
    ->middleware('auth');

Route::get('/editors', [EditorController::class, 'index']);
Route::get('/editors/create', [EditorController::class, 'create'])->middleware('auth');
Route::post('/editors', [EditorController::class, 'store'])->middleware('auth');
Route::get('/editors/{editor}', [EditorController::class, 'show']);
Route::get('/editors/{editor}/edit', [EditorController::class, 'edit'])
    ->middleware('auth');
Route::patch('/editors/{editor}', [EditorController::class, 'update'])
    ->middleware('auth');
Route::delete('/editors/{editor}', [EditorController::class, 'destroy'])
    ->middleware('auth');

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/create', [AuthorController::class, 'create'])->middleware('auth');
Route::post('/authors', [AuthorController::class, 'store'])->middleware('auth');
Route::get('/authors/{author}', [AuthorController::class, 'show']);
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])
    ->middleware('auth');
Route::patch('/authors/{author}', [AuthorController::class, 'update'])
    ->middleware('auth');
Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])
    ->middleware('auth');

Route::get('/search', SearchController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
