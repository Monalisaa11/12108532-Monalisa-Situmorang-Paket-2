<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Borrowed::with('books')->where('user_id', Auth::user()->id)->get();
        return view('pages.borrowed.index', compact('datas'));
    }

    function borrowBook($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->update([
            'available' => false
        ]);

        Borrowed::create([
            'book_id' => $book->id,
            'user_id' => Auth::user()->id,
            'tanggal_peminjaman' => now()->toDateString(),
            'status' => 'dipinjam',
        ]);

        return redirect()->back()->with('success', 'Book borrowed successfully.');
    }

    function returnBook($id)
    {
        $borrowed =  Borrowed::where('id', $id)->where('user_id', Auth::user()->id)->first();

        $book = Book::where('id', $borrowed->book_id); 
        $book->update([
            'available' => true
        ]);
        $borrowed->update([
            'tanggal_pengembalian' => Carbon::now(),
            'status' => 'kembali'
        ]);
        return back()->with('success', "Berhasil Kembalikan Buku");
    }
}