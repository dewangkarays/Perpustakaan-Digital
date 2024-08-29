<!-- resources/views/categories/updatekategori.blade.php -->

@extends('layouts.mainlayout')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <h2>Edit Kategori</h2>
   
    <form method="post" action="{{ route('categories.update', ['id' => $category->id]) }}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('category') }}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
    </form>
</div>
    </div>
@endsection
