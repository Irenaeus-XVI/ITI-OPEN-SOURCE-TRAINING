<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category; // Import the Category model
use App\Models\Tag; // Import the Tag model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all books with category and tags relationships
        $books = Book::with('category', 'tags')->get();
        // Return the books as a collection of BookResource
        return response()->json([
            "message" => "All Books",
            "status_code" => 200,
            "data" => BookResource::collection($books)
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $fileName = Book::uploadFile($request, $request->pic);

        $book = Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
            "cat_id" => $request->category,
            "pic" => $fileName
        ]);

        // Associate tags with the book (if needed)
        if ($request->has('tags')) {
            $tags = Tag::whereIn('id', $request->tags)->get();
            $book->tags()->attach($tags);
        }

        return response()->json([
            "message" => "Book Created",
            "status_code" => 201,
            "data" => new BookResource($book)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json([
            "message" => "Book Find",
            "status_code" => 200,
            "data" => new BookResource($book)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update([
            'price' => $request->price
        ]);
        return response()->json([
            "message" => "Book updated",
            "status_code" => 200,
            "data" => new BookResource($book)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json([
            "message" => "Book Deleted",
            "status_code" => 200,
            "data" => []
        ]);
    }
}
