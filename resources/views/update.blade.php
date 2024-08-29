
@extends('layouts.mainlayout')

@section('title', 'Edit Buku')

@section('content')
    <div class="container">
        <h2>Edit Buku</h2>
        <form method="post" action="{{ route('books.update', ['book' => $book->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $book->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $book->jumlah }}" required>
            </div>

            <div class="mb-3">
                <label for="file_buku" class="form-label">File Buku (PDF)</label>
                <input type="file" class="form-control" id="file_buku" name="file_buku" accept=".pdf" required>
            </div>

            <div class="mb-3">
                <label for="cover_buku" class="form-label">Cover Buku (JPG, JPEG, PNG)</label>
                <input type="file" class="form-control" id="cover_buku" name="cover_buku" accept=".jpg, .jpeg, .png" required>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('buku') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </form>
    </div>
@endsection
