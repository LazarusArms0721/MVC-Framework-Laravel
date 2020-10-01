<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Blog;


class DashboardController extends Controller
{

    public function showDashboard(){

        $assignments = Assignment::all()->sortByDesc('created_at');
        $blogs = Blog::all()->sortByDesc('created_at');

        $currentPath = \Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri();

        return view('dashboard', compact('blogs','assignments', 'currentPath'));
    }
}
