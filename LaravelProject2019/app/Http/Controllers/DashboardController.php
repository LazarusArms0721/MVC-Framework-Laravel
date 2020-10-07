<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Blog;
use App\User;
use App\Role;


class DashboardController extends Controller
{

    public function showDashboard(){

        $assignments = Assignment::all()->sortByDesc('created_at');
        $blogs = Blog::all()->sortByDesc('created_at');
        $users = User::all();

        $currentPath = \Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri();

        return view('dashboard', compact('blogs','assignments', 'currentPath','users'));
    }

    public function createRole(){
        $users = User::all();
        
    }
}
