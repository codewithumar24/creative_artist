<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
         $recentUsers = User::latest()
                      ->take(5)
                      ->get();
 $recentArtworks = Artwork::latest()
                          ->take(3)
                          ->get();
                           return view("dashboard.index", compact('recentUsers','recentArtworks'));
        // if (Gate::allows("is_admin")) {
        //     return view("dashboard.index", compact('recentUsers','recentArtworks'));
        // } else {
        //     abort(403, 'You are not allow to thsi page');
        // }
    }
}
