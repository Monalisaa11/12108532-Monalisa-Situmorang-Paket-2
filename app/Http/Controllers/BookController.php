<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\Ulasan;
use App\Models\CategoryBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
    {
        $datas = Book::with('categoryBook')->latest()->get();
        return view('pages.admin.book.index', compact('datas'));
    }
    function create()
    {
        $categoryBooks = CategoryBook::all();
        return view('pages.admin.book.create', compact('categoryBooks'));
    }

    function store(Request $request)
    {
        $request->validate([
            'category_book_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'tanggal' => 'required',
            'cover' => 'required',
            'deskripsi' => 'required',
            
        ]);

        $image = $request->file('cover');
        $imgName = time() . rand() . '.' . $image->extension();
        if (!file_exists(public_path('/assets/upload' . $image->getClientOriginalName()))) {
            $destinationPath = public_path('/assets/upload');
            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        } else {
            $uploaded = $image->getClientOriginalName();
        }

        Book::create([
            'category_book_id' => $request->category_book_id,
            'judul' => $request->judul,
            'penulis' =>  $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'tanggal' => now(),
            'cover' => $uploaded,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul),
            'available' => true,
           
          
        ]);

        return redirect()->route('book.index')->with('success', 'Galeri Berhasil Ditambah!');
    }


    function edit($id)
    {
        $data = Book::where('id', $id)->first();
        $categoryBooks = CategoryBook::all();
        return view('pages.admin.book.edit', compact('data', 'categoryBooks'));
    }

    public function update(Request $request, $id)
    {
        $item = Book::find($id);

        $request->validate([
            'category_book_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('cover')) {
            $gambar = $request->file('cover');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalName();
            $lokasi = public_path('assets/upload/');
            $gambar->move($lokasi, $nama_gambar);

          
            $data = Book::where('id', $id)->first();
            $file_path = public_path('assets/upload/' . $data->cover);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $data->update([
                'cover' => $nama_gambar,

            ]);
        } else {
            $data = Book::first();
            $data->update([
                'cover' => $data->cover,
            ]);
        }

        $item->update([
            'judul' => $request->judul,
            'categoryblog_id' => $request->categoryblog_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'label' => $request->label,
            'slug' => Str::slug($request->judul, '-')
        ]);
        return redirect()->route('book.index')->with('success', "Berhasil Upload Data");
    }
    function destroy($id)
    {
        $data = Book::where('id', $id)->first();
        $foto_path = public_path('/assets/upload' . $data->cover);

        if (file_exists($foto_path)) {
            unlink($foto_path);
        }
        $data->delete();
        return redirect()->route('book.index')->with("success", "berhasil hapus data");
    }

    function borrowed(){
        return view('pages.borrowed.index');
    }

    public function detailBook($slug)
    {
        $data = Book::where('slug', $slug)->first();
        $ulasans = Ulasan::with('user')->where('book_id', $data->slug)->latest()->get();
    

        return view('pages.borrowed.detail-book', compact('data' , 'ulasans'));
    }

    function showBook()
    {
        $datas = Book::with('borrowed')->latest()->get();

        return view('pages.borrowed.show-book', compact('datas'));
    }
     
    public function search(Request $request)
{
    $query = $request->input('query');

    // Lakukan pencarian data berdasarkan query
    $results = Book::where('column', 'like', '%' . $query . '%')->get();

    return view('search-results', ['results' => $results]);
}

    function exportBook(){
        $data['book'] = Book::all();
        $pdf = Pdf::loadView('book', $data);
        return $pdf->download('Book-data.pdf');
    }

}