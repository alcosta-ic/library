<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    public function editor(): belongsTo
    {
        return $this->belongsTo(Editor::class);
    }

    public function authors(): belongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }
}
