<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\ValidationException;

class TagsController extends Controller
{
    // Get a list of all tags
    public function index()
    {
        $tags = Tag::all();
        return response()->json([
            'data' => $tags
        ]);
    }

    // Get a single tag by ID
    public function show($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json([
                'message' => 'Tag not found'
            ], 404);
        }
        return new TagResource($tag); // Return the formatted tag resource Select Specific Attr
    }

    // Other methods for CRUD operations on tags...

    // Create a new tag
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255'
        ]);

        $tag = Tag::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Tag created',
            'data' => $tag
        ], 201);
    }

    // Update an existing tag by ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $id . '|max:255'
        ]);

        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json([
                'message' => 'Tag not found'
            ], 404);
        }

        $tag->update([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Tag updated',
            'data' => $tag
        ]);
    }

    // Delete a tag by ID
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json([
                'message' => 'Tag not found'
            ], 404);
        }

        $tag->delete();

        return response()->json([
            'message' => 'Tag deleted'
        ]);
    }
}
