<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function create()
    {
        return view('createkategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category')->with('success', 'Kategori berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('updatekategori', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category')->with('success', 'Kategori berhasil dihapus!');
    }
    

}
