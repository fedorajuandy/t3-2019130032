@extends('layout.master')

@section('title', $book->judul)

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $book->judul }}</h2>
        </div>
        <div class="col-md-4">
            <div class="float-right">
                <div class="btn-group" role="group">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary ml-3">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        <button type="submit" class="btn btn-danger ml-3">Delete</button>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Halaman: {{ $book->halaman }}</li>
            <li class="list-group-item">Kategori: {{ $book->kategori }}</li>
            <li class="list-group-item">Penerbit: {{ $book->penerbit }}</li>
            <li class="list-group-item"> Author: {{ $author->nama }}</li>
        </ul>
    </div>
</div>
@endsection
