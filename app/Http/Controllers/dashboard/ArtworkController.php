<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;

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
            'title' => 'required|max:100|unique:artworks',
            'description' => 'required|max:200',
            'medium' => 'required',
            'image' => 'required|max:2048|mimes: jpg,jpeg,png',
            'artist_name' => 'required',
            'artist_image' => 'required|max:2048|mimes: jpg,jpeg,png',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
