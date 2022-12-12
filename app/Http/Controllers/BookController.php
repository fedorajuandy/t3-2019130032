<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Author;
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
        $books = Book::all();
        $authors = Author::all();
        return view('books.index', compact('books'), compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
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
            'id' => 'required|min:13|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required|min:13|max:13',
        ]);

        Book::create($validateData);

        $request->session()->flash('success', 'Successfully adding new data!');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $author = DB::table('authors')->select('nama')->where('id', "$book->author_id")->first();
        return view('books.show', compact('book'), compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact("book"), compact("authors"));
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
            'id' => 'required|min:13|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required|min:13|max:13',
        ];

        $validated = $request->validate($rules);

        $book->update($validated);
        $request->session()->flash('success', "Berhasil memperbaharui data file {$validated['judul']}.");
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', "Successfully deleting {$book['judul']}!");
    }
}
