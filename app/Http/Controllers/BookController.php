<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function index()
     {
        $books = Book::all();

        return view ('book', compact('books'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'file_buku' => 'mimes:pdf',
            'cover_buku' => 'image|mimes:jpeg,png,jpg',
            'kategori_id' => 'required|exists:categories,id',
        ]);
        $fileBukuPath = $request->file('file_buku')->store('buku', 'public');
        $coverBukuPath = $request->file('cover_buku')->store('covers', 'public');
        Book::create([
            'title' => $request->input('title'),
            'deskripsi' => $request->input('deskripsi'),
            'jumlah' => $request->input('jumlah'),
            'file_buku' => $fileBukuPath,
            'cover_buku' => $coverBukuPath,
            'kategori_id' => $request->input('kategori_id'),
        ]);

        return redirect()->route('buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('update', compact('book', 'categories'));
    }

    public function destroy($id)
{
    $book = Book::findOrFail($id);
    Storage::disk('public')->delete([$book->file_buku, $book->cover_buku]);
    $book->delete();

    return redirect()->route('buku')->with('success', 'Buku berhasil dihapus!');
}

public function exportToPDF()
{
    $books = Book::all();
    $pdf = PDF::loadView('exports.books', compact('books'));
    return $pdf->download('books.pdf');
}

public function exportToExcel()
{
    return Excel::download(new BooksExport, 'books.xlsx');
}



}
