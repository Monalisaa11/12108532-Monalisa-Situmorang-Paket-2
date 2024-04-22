<?php

namespace App\Http\Controllers;

use App\Models\CategoryBook;

use Illuminate\Http\Request;

class CategoryBookController extends Controller
{

    function index()
    {

        $datas = CategoryBook::latest()->get();
        return view('pages.admin.category_book.index', compact('datas'));
    }

    function create()
    {
        return view('pages.admin.category_book.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        CategoryBook::create([
            'name' => $request->name
        ]);

        return redirect()->route('category-book.index')->with('success', "Berhasil menambahkan data");
    }


    function show(CategoryBook $categoryBook)
    {
        //
    }


    function edit($id)
    {
        $data = CategoryBook::where('id', $id)->first();
        return view('pages.admin.category_book.edit', compact('data'));
    }

    function update(Request $request, $id)
    {
        $data = CategoryBook::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
        ]);

        $data->update([
            'name' => $request->name,
        ]);
        return redirect()->route('category-book.index')->with('success', "Berhasil Ubah Data");
    }


    function destroy($id)
    {
        $data = CategoryBook::find($id);
        $data->delete();
        return redirect()->route('category-book.index')->with("success", "Berhasil hapus data");
    }
}
