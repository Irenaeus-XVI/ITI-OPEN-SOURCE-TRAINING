<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // list 
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        $page = "Books";
        return view('books', [
            "page" => $page,
            "books" => $books
        ]);
    }
    // view page of create

    public function create()
    {
        $page = "create book";
        return view('create-book', ['page' => $page]);
    }
    // create
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
        ]);
        return redirect()->route('books.index');
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);
        return view('show', compact('book'));
    }

    public function destroy($book)
    {
        $book = Book::find($book);
        $book->delete();
        return redirect()->back();
    }


    public function edit($book)
    {
        $book = Book::findOrFail($book);
        $page = "Edit Book";
        return view('edit', compact('page', 'book'));
    }

    public function update(Request $request, $book)
    {
        $book = Book::findOrFail($book);

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $book->update([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
        ]);

        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully!');
    }
}
