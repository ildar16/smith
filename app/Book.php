<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [
        'name', 'price', 'date'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }
}
