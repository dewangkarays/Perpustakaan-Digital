<!-- resources/views/categories/createkategori.blade.php -->

@extends('layouts.mainlayout')

@section('title', 'Tambah Kategori Baru')

@section('content')
    <div class="container">
        <h2>Tambah Kategori Baru</h2>
       
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
