<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all categories
        $categories = Category::all();

        // Return the categories as a collection of CategoryResource
        return response()->json([
            'message' => 'All Categories',
            'status_code' => 200,
            'data' => CategoryResource::collection($categories),
        ]);
    }

    /**
     * Display the specified category by name.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        // Find the category by its name
        $category = Category::where('name', $name)->firstOrFail();

        // Return the category as a resource
        return new CategoryResource($category);
    }

    /**
     * Store a new category with the specified name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        // Create the category
        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category created',
            'status_code' => 201,
            'data' => new CategoryResource($category),
        ]);
    }

    /**
     * Update the specified category by name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        // Find the category by its name
        $category = Category::where('name', $name)->firstOrFail();

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        // Update the category
        $category->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category updated',
            'status_code' => 200,
            'data' => new CategoryResource($category),
        ]);
    }

    // Add other methods as needed, such as destroy, etc.
}
