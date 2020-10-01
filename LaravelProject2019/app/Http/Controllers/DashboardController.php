<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Blog;


class DashboardController extends Controller
{

    public function showDashboard(){

        $assignments = Assignment::all();
        $blogs = Blog::all();


        return view('dashboard', compact('blogs','assignments'));
    }
}
