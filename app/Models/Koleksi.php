<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
