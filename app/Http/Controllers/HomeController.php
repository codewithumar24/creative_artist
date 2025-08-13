<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index(){
    return view("home.index");
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
    return view("home.artist");
}
public function profile(){
    return view("home.profile");
}
}
