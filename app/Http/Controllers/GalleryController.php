<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Gallery::with('destination')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'image_url' => 'required|url',
        ]);

        $gallery = Gallery::create($validated);
        return response()->json($gallery, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Gallery::with('destination')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'image_url' => 'sometimes|required|url',
        ]);

        $gallery->update($validated);
        return response()->json($gallery, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return response()->json(null, 204);
    }
}
