@extends('layouts.mainlayout')

@section('title', 'Kategori')

@section('content')`
<div class="container">
  <h2>Daftar Kategori</h2>
  <a href="createkategori" class="btn btn-primary mb-3">Create</a>
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($categories as $category)
              <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                          </form>
                </td>
              </tr>
          @empty
              <tr>
                  <td colspan="2">Tidak ada kategori.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
</div>
@endsection