<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:100',
            'description' => 'max:65535',
            'year' => 'required|integer|min:1900|max:2099',
            'rating' => 'required|numeric|min:1|max:10',
        ]);

        /* $movie = new Movie();
        $movie->title = $validateData['title'];
        $movie->genre = $validateData['genre'];
        $movie->description = $validateData['description'];
        $movie->year = $validateData['year'];
        $movie->rating = $validateData['rating'];
        $movie->save(); */

        Movie::create($validateData);

        /* flash data: store message into session for 1 redirect process */
        /* flash('key', 'data') */
        $request->session()->flash('success','Successfully adding new data!');
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('movies.edit', compact("movie"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'title' => 'required|max:255',
            'genre' => 'required|max:100',
            'description' => '',
            'year' => 'required|integer|min:1900|max:2099',
            'rating' => 'required|numeric|min:1|max:5',
        ];

        /* $validateData = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:100',
            'description' => 'max:65535',
            'year' => 'required|integer|min:1900|max:2099',
            'rating' => 'required|numeric|min:1|max:5',
        ]); */

        $validated = $request->validate($rules);

        $movie->update($validated);
        $request->session()->flash('success', "Berhasil memperbaharui data file {$validated['title']}.");

        /* $movie->update($validateData);
        $request->session()->flash('success',"Successfully updating {$validateData['title']}!");
        return redirect()->route('movies.index'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success',"Successfully deleting {$movie['title']}!");
    }
}
