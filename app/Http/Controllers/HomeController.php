<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index(){
    $artwork = Artwork::all();
    return view("home.index",['artworks'=>$artwork]);
}
public function about(){
    return view("home.about");
}
public function gallery(){
    $artwork= Artwork::all();
    return view("home.gallery",['artworks'=>$artwork]);
}
public function contact(){
    return view("home.contact");
}
public function artist(){
    $artist = Artist::all();
    return view("home.artist",['artists'=>$artist]);
}
public function profile(){
    return view("home.profile");
}
}
