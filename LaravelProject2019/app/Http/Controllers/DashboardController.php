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

    public function getUser(User $user){
        $user = User::find($user->id);
        $roles = Role\UserRole::getRoleList();

        return view('user_single', compact('user', 'roles'));

    }

    public function updateUser(Request $request,  User $user ){
        $userUpdate = User::where('id', $user->id)->update([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('roles'),


        ]);


        if ($userUpdate){

            return redirect('/dashboard')->with('success', 'Blog updated sucessfully');
        }


        return back()->withInput();
    }

    public function deleteUser(User $user){


        $user->delete();

        return redirect('/dashboard');

    }

}
