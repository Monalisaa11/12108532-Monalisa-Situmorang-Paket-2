<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $datas = Koleksi::with('books')->where('user_id', Auth::user()->id)->get();


        return view('pages.collection.index', compact('datas'));
    }

    function store(Request $request)
    {
        $userId = Auth::user()->id;
        $bookId = $request->book_id;
        $existingCollection = Koleksi::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->exists();

        if ($existingCollection) {
            return redirect('/collection')->with('error', 'Buku ini sudah ada dalam koleksi Anda.');
        }
        Koleksi::create([
            'user_id' => $userId,
            'book_id' => $bookId
        ]);

        return redirect('/collection')->with('success', 'Berhasil menambahkan koleksi buku.');
    }
}
