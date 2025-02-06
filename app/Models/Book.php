<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Crypt;

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


    //Defining a Mutator to encrypt data before saving
    public function setNameAttribute($value)
    {
       $this->attributes['name'] = Crypt::encryptString($value);
    }

    //Defining an Accessor to decrypt data when accessing
    public function getNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

}
