<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {

        if (Gate::allows("is_admin")) {
            return view("dashboard.index");
        } else {
            abort(403, 'You are not allow to thsi page');
        }
    }
}
