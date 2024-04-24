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

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function isAvailableForBorrowing()
    {
        $borrowed = $this->borrowed()->where('status', 'dipinjam')->exists();
        return !$borrowed;
    }
}
