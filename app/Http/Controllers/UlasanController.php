<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ]);

        Ulasan::create([
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'ulasan' => $request->input('ulasan'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan.');
    }
        // dd($request->all());


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
