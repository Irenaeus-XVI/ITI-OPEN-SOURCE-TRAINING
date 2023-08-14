<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class BookController extends Controller
{
    public function index()
    {
        // Fetch books with category and tags relationships, and order by descending ID
        $books = Book::with('category', 'tags')->orderBy('id', 'desc')->paginate(10);
    
        // Return the view with books and page title
        $page = "Books";
        return view('books', [
            "page" => $page,
            "books" => $books
        ]);
    }
    

    public function create()
    {
        $page = "Create Book";
        $categories = Category::all();
        $tags = Tag::all();
        return view('create-book', compact('page', 'categories', 'tags'));
    }

    public function store(CreateBookRequest $request)
    {
        $fileName = Book::uploadFile($request, $request->pic);

        $book = Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
            "cat_id" => $request->category,
            "pic" => $fileName,
        ]);

        // Associate tags with the book
        if ($request->has('tags')) {
            $tags = Tag::whereIn('id', $request->tags)->get();
            $book->tags()->attach($tags);
        }

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
        $categories = Category::all();
        $tags = Tag::all();
        $page = "Edit Book";
        return view('edit', compact('page', 'book', 'categories', 'tags'));
    }

    public function update(Request $request, $book)
    {
        $book = Book::findOrFail($book);

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|exists:categories,id',
        ]);

        $book->update([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
            "cat_id" => $request->category,
        ]);

        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully!');
    }

    public function updateTags(Request $request, $book)
    {
        $book = Book::findOrFail($book);

        $request->validate([
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($request->has('tags')) {
            $tags = Tag::whereIn('id', $request->tags)->get();
            $book->tags()->sync($tags);
        } else {
            $book->tags()->detach();
        }

        return redirect()->route('books.edit', $book->id)->with('success', 'Tags updated successfully!');
    }
}
