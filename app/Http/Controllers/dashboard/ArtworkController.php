<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artwork = Artwork::all();
        return view("dashboard.artwork.index", ['artworks' => $artwork]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("dashboard.artwork.create", ['categorys' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|unique:artworks',
            'description' => 'required|string|max:200',
            'medium' => 'required|string',
            'image' => 'required|string|max:2048|mimes: jpg,jpeg,png',
            'artist_name' => 'required|string',
            'artist_image' => 'required|max:2048|string|mimes: jpg,jpeg,png',
            'category_id' => 'required'
        ]);

        $path = $request->file("image")->store("uploads", "public");
        $artistImagePath = $request->file("artist_image") ? $request->file("artist_image")->store("uploads", "public") : null;

        Artwork::create([
            'title' => $request->input("title"),
            'description' => $request->input("description"),
            'medium' => $request->input("medium"),
            'image' => $path,
            'artist_name' => $request->input("artist_name"),
            'artist_image' => $artistImagePath,
            'category_id' => $request->input("category_id"),
        ]);
        return redirect()->route("artwork.index")->with([
            'success' => 'Artwork created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artwork = Artwork::with('category')->findOrFail($id);
        return view('dashboard.artwork.show', compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artwork = Artwork::findOrFail($id);
        $categories = Category::all(); // Make sure to pass categories if needed
        return view("dashboard.artwork.edit", compact('artwork', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artwork = Artwork::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:100|unique:artworks,title,' . $artwork->id,
            'description' => 'required|string|max:200',
            'medium' => 'required|string',
            'image' => 'sometimes|image|max:2048|mimes:jpg,jpeg,png',
            'artist_name' => 'required|string',
            'artist_image' => 'sometimes|image|max:2048|mimes:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Prepare the update data
        $updateData = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'medium' => $request->input('medium'),
            'artist_name' => $request->input('artist_name'),
            'category_id' => $request->input('category_id'),
        ];


        if ($request->hasFile('image')) {

            if ($artwork->image && Storage::disk('public')->exists($artwork->image)) {
                Storage::disk('public')->delete($artwork->image);
            }
            $updateData['image'] = $request->file('image')->store('uploads', 'public');
        }

        if ($request->hasFile('artist_image')) {
            if ($artwork->artist_image && Storage::disk('public')->exists($artwork->artist_image)) {
                Storage::disk('public')->delete($artwork->artist_image);
            }
            $updateData['artist_image'] = $request->file('artist_image')->store('uploads', 'public');
        }

        // Update the artwork
        $artwork->update($updateData);

        return redirect()->route('artwork.index')->with([
            'success' => 'Artwork updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $artwork = Artwork::findOrFail($id);

            if ($artwork->image && Storage::disk('public')->exists($artwork->image)) {
                Storage::disk('public')->delete($artwork->image);
            }

            if ($artwork->artist_image && Storage::disk('public')->exists($artwork->artist_image)) {
                Storage::disk('public')->delete($artwork->artist_image);
            }

            $artwork->delete();

            return redirect()->route('artwork.index')->with([
                'success' => 'Artwork deleted successfully'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('artwork.index')->with([
                'error' => 'Error deleting artwork: ' . $e->getMessage()
            ]);
        }
    }
}
