<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
   public function index()
{
    
    $artists = Artist::with('user')->get();
    return view("dashboard.artist.index", compact('artists'));
}
    public function create()
    {
        return view("dashboard.artist.create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'specialty' => 'required|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:100',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            'dribbble' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255'
        ]);

        $validated['user_id'] = auth()->id();
            $artist = Artist::create($validated);

            return redirect()->route('artist.index')->with([
                'success' => 'Artist created successfully!'
            ]);
    }

    public function edit(string $id)
    {
        $this->authorize('edit',$id);
        $artist = Artist::findOrFail($id);
        return view('dashboard.artist.edit', compact('artist'));
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit',$id);
        $artist = Artist::findOrFail($id);

        $validated = $request->validate([
            'specialty' => 'required|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:100',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            'dribbble' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255'
        ]);
            

            $artist->update($validated);

            return redirect()->route('artist.index')->with([
                'success' => 'Artist updated successfully!'
            ]);
    }

    public function destroy($id)
    {
        $this->authorize('edit',$id);
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return redirect()->route("artist.index")->with([
            'success' => 'Your profile is deleted successfully'
        ]);
    }

public function show($id)
{
    $artist = User::findOrFail($id);
    $artworks = Artwork::where('user_id', $id)
                ->latest()
                ->take(5)
                ->get();

    return view('dashboard.artist.show', compact('artist', 'artworks'));
}
}
