<!-- resources/views/books/create.blade.php -->

@extends('layouts.mainlayout')

@section('title', 'Tambah Buku Baru')

@section('content')
    <div class="container">
        <h2>Tambah Buku Baru</h2>
        <!-- Form untuk membuat buku baru -->
        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Isi form sesuai kebutuhan -->
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>

            <div class="mb-3">
                <label for="file_buku" class="form-label">File Buku (PDF)</label>
                <input type="file" class="form-control" id="file_buku" name="file_buku" accept=".pdf" >
            </div>

            <div class="mb-3">
                <label for="cover_buku" class="form-label">Cover Buku (JPG, JPEG, PNG)</label>
                <input type="file" class="form-control" id="cover_buku" name="cover_buku" accept=".jpg, .jpeg, .png" >
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
