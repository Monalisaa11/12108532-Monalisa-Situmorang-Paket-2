<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
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
            'tanggal_pengembalian' => now()->toDateString(),
            'status' => 'dipinjam',
        ]);

        return redirect()->back()->with('success', 'Book borrowed successfully.');
    }

    function returnBook($id)
    {
        $borrowed = Borrowed::where('id', $id)->where('user_id', Auth::user()->id)->first();

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

    //     public function store(Request $request)
    //     {
    //         //
    //     }

    //     /**
    //      * Display the specified resource.
    //      */
    //     public function show(Borrowed $borrowed)
    //     {
    //         //
    //     }

    //     /**
    //      * Show the form for editing the specified resource.
    //      */
    //     public function edit(Borrowed $borrowed)
    //     {
    //         //
    //     }

    //     /**
    //      * Update the specified resource in storage.
    //      */
    //     public function update(Request $request, Borrowed $borrowed)
    //     {
    //         //
    //     }

    //     /**
    //      * Remove the specified resource from storage.
    //      */
    //     public function destroy(Borrowed $borrowed)
    //     {
    //         //
    //     }
}
