<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $artworks = Artwork::with('user')->get();
        $artworks = auth()->user()->artworks;
        // $artwork = Artwork::all();
        // $artworks = $user->artworks()->with('category')->latest()->get();
        return view("dashboard.artwork.index", ['artworks' => $artworks]);
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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'medium' => 'required|string|max:255',
        'price' => 'required|decimal|max:10',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    
        'category_id' => 'required|exists:categories,id',
    ]);

    // image upload
    $imagePath = $request->file('image')->store('uploads/artworks', 'public');

    // save data
    $artwork = new Artwork();
    $artwork->title = $validated['title'];
    $artwork->description = $validated['description'] ?? null;
    $artwork->medium = $validated['medium'];
    $artwork->price = $validated['price'];
    $artwork->image = $imagePath;
        $artwork->user_id = auth()->id(); 
    $artwork->category_id = $validated['category_id'];
    $artwork->save();

    // redirect with success message
    return redirect()->route('artwork.index')->with('success', 'Artwork added successfully!');
}


    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $artwork = Artwork::with('category')->findOrFail($id);
    //     return view('dashboard.artwork.show', compact('artwork'));
    // }

    public function show($id)
{
    $artwork = Artwork::with(['user', 'category'])->findOrFail($id);
    return view('dashboard.artwork.show', compact('artwork'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $this->authorize('update', $id);
        $artwork = Artwork::findOrFail($id);
        $categories = Category::all(); // Make sure to pass categories if needed
        return view("dashboard.artwork.edit", compact('artwork', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update',$id);
        $artwork = Artwork::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:100|unique:artworks,title,' . $artwork->id,
            'description' => 'required|string|max:200',
            'medium' => 'required|string',
             'price' => 'required|decimal|max:10',
            'image' => 'sometimes|image|max:2048|mimes:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Prepare the update data
        $updateData = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'medium' => $request->input('medium'),
            'price'=> $request->input('price'),
            'category_id' => $request->input('category_id'),
        ];


        if ($request->hasFile('image')) {

            if ($artwork->image && Storage::disk('public')->exists($artwork->image)) {
                Storage::disk('public')->delete($artwork->image);
            }
            $updateData['image'] = $request->file('image')->store('uploads', 'public');
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
          $this->authorize('update', $id);
        try {
            $artwork = Artwork::findOrFail($id);

            if ($artwork->image && Storage::disk('public')->exists($artwork->image)) {
                Storage::disk('public')->delete($artwork->image);
            }

            // if ($artwork->artist_image && Storage::disk('public')->exists($artwork->artist_image)) {
            //     Storage::disk('public')->delete($artwork->artist_image);
            // }

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




//     public function showFrontend($id)
// {
//     $painting = Artwork::findOrFail($id); // artworks table se record
//     return view('home.paintings.detail', compact('painting'));
// }
}
