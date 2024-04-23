<?php

namespace App\Models;

use App\Models\Koleksi;
use App\Models\CategoryBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 

    public function categoryBook()
    {
        return $this->belongsTo(CategoryBook::class);
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class);
    }

    public function borrowed()
    {
        return $this->hasMany(Borrowed::class);
    }

    public function books(){
        return $this->hasMany(CategoryBook::class, 'category_book_id');
        }

        public function search(){
            return $this->hasMany(Search::class);
            }
        
    public function isAvailableForBorrowing()
    {
        $borrowed = $this->borrowed()->where('status', 'dipinjam')->exists();
            return !$borrowed;
    }
    
}
