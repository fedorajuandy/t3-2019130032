@extends('layout.master')

@section('title', $author->nama)

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $author->nama }}</h2>
        </div>
        <div class="col-md-4">
            <div class="float-right">
                <div class="btn-group" role="group">
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary ml-3">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
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
          <li class="list-group-item">Kota: {{ $author->kota }}</li>
          <li class="list-group-item">Negara: {{ $author->negara }}</li>
        </ul>
    </div>
</div>
@endsection
