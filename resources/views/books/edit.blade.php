@extends('layout.master')

@section('title', 'Edit Book')

@section('content')
<h2>Update New Book</h2>
    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="title">Id</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{ old('id') ?? $book->id }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="title">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul') ?? $book->judul }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="title">Halaman</label>
                <input type="text" class="form-control @error('halaman') is-invalid @enderror" name="halaman" id="halaman" value="{{ old('halaman') ?? $book->halaman }}">
                @error('halaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="title">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" value="{{ old('kategori') ?? $book->kategori }}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="title">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" id="penerbit" value="{{ old('penerbit') ?? $book->penerbit }}">
                @error('penerbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="title">Author</label>
                <select class="custom-select form-control @error('author_id') is-invalid @enderror" name="author_id" id="author_id" value="{{ old('author_id') }}">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->nama }}</option>
                    @endforeach
                    @error('author_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </select>
            </div>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
