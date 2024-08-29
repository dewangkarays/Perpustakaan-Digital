@extends('layouts.mainlayout')

@section('title', 'Buku')

@section('content')`
<div class="container">
   <h2>Data Buku</h2>
   <a href="create" class="btn btn-primary mb-3">Create</a>
   <div class="mb-3">
      <a href="{{ route('books.export.pdf') }}" class="btn btn-danger">Export to PDF</a>
      <a href="{{ route('books.export.excel') }}" class="btn btn-success">Export to Excel</a>
  </div>
   <table class="table">
       <thead>
           <tr>
               <th>ID</th>
               <th>Judul</th>
               <th>Deskripsi</th>
               <th>Jumlah</th>
               <th>File Buku</th>
               <th>Cover Buku</th>
               <th>Kategori</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach($books as $book)
           <tr>
               <td>{{ $book->id }}</td>
               <td>{{ $book->title }}</td>
               <td>{{ $book->deskripsi }}</td>
               <td>{{ $book->jumlah }}</td>
               <td>{{ $book->file_buku }}</td>
               <td>{{ $book->cover_buku }}</td>
               <td>{{ $book->category->name }}</td>
               <td>
                  <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-primary">Edit</a>
                  <form action="{{ route('destroy', ['book' => $book->id]) }}" method="post" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Delete</button>
                  </form>
              </td>
           </tr>
           @endforeach
       </tbody>
   </table>
</div>
@endsection