<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index()
    {
        $artist = Artist::all();
        return view("dashboard.artist.index", ['artists' => $artist]);
    }
    public function create()
    {
        return view("dashboard.artist.create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'specialty' => 'required|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:100',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            'dribbble' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255'
        ]);

        try {
            if ($request->hasFile('avatar')) {
                $validated['avatar'] = $request->file('avatar')->store('artists/avatars', 'public');
            }
            $artist = Artist::create($validated);

            return redirect()->route('artist.index')->with([
                'success' => 'Artist created successfully!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'error' => 'Error creating artist: ' . $e->getMessage()
            ]);
        }
    }

    public function edit(string $id)
    {
        $artist = Artist::findOrFail($id);
        return view('dashboard.artist.edit', compact('artist'));
    }

    public function update(Request $request, string $id)
    {
        $artist = Artist::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'specialty' => 'required|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            'dribbble' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255'
        ]);

        try {
            if ($request->hasFile('avatar')) {
                if ($artist->avatar && Storage::disk('public')->exists($artist->avatar)) {
                    Storage::disk('public')->delete($artist->avatar);
                }
                $validated['avatar'] = $request->file('avatar')->store('artists/avatars', 'public');
            }

            $artist->update($validated);

            return redirect()->route('artist.index')->with([
                'success' => 'Artist updated successfully!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'error' => 'Error updating artist: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        if ($artist->avatar && Storage::disk('public')->exists($artist->avatar)) {
            Storage::disk('public')->delete($artist->avatar);
        }
        $artist->delete();
        return redirect()->route("artist.index")->with([
            'success' => 'Your profile is deleted successfully'
        ]);
    }


    public function show(string $id)
{
    $artist = Artist::with(['artworks' => function($query) {
        $query->latest()->take(5);
    }])->findOrFail($id);

    return view('dashboard.artist.show', compact('artist'));
}
}
