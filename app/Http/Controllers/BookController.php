<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use App\Author;
use View;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('authors')->get();
        
        return View::make('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return View::make('books._form', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $author = Author::findOrFail($request->author);

        $book = Book::create($request->except('_token', 'author'));

        $author->books()->attach($book->id);

        return redirect()->route('books.show', [$book->id])->with('success','Книга создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('authors')->findOrFail($id);
        
        return View::make('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::with('authors')->findOrFail($id);
        $authors = Author::all();

        return View::make('books._form', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $author = Author::findOrFail($request->author);

        $book = Book::where('id', $id)->update($request->except('_token', 'author', '_method'));

        $author->books()->attach($id);

        return redirect()->route('books.show', [$id])->with('success','Книга изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        return Book::with('authors')->get();
    }

    public function find($id)
    {
        return Book::with('authors')->findOrFail($id);
    }
}
