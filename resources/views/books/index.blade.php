@extends('layout.master')

@section('title', 'Book List')

@push('css_after')
<style>
    td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endpush

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Book List</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('books.create') }}" class="btn btn-success">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Add New Book</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Halaman</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Author id</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movies as $movie)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $movie->judul }}</td>
                    <td>{{ $movie->halaman }}</td>
                    <td>{{ $movie->kategori }}</td>
                    <td>{{ $movie->penerbit }}</td>
                    <td style="width: 40%">{{ $movie->author_id }}</td>
                </tr>
                @empty
                <tr>
                    <td align="center" colspan="6">No data yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
