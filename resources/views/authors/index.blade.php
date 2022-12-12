@extends('layout.master')

@section('title', 'Author List')

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
                    <h2>Author List</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('authors.create') }}" class="btn btn-success">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Add New Author</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Kota</th>
                    <th>Negara</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->nama }}</td>
                    <td>{{ $author->kota }}</td>
                    <td>{{ $author->negara }}</td>
                    <td>
                        <a href="{{ route('authors.show', $author->id)  }}" type="button" class="btn btn-sm btn-info">
                            <span class="text-light">View</span>
                        </a>
                    </td>
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
