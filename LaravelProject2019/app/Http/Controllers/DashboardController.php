<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\Assignment;
use App\Blog;
use App\User;
use App\Role;



class DashboardController extends Controller
{

    public function showUserDashboard(){

        $user = User::find(Auth::user()->id);

        return view('user_dashboard', compact('user'));
    }

    public function editUserDashboard(User $user, Alert $alert){
        $user = User::find($user->id);
        $roles = Role\UserRole::getRoleList();
        $alert = Alert::warning('Warning Title', 'Warning Message');

        return view('user_dashboard_single', compact('user', 'roles', 'alert'));
    }

    public function showDashboard(){

        $assignments = Assignment::orderBy('created_at', 'DESC')->paginate(10);
        $blogs = Blog::orderBy('created_at','DESC')->paginate(10);
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
            'roles' => $request->input('roles'),

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

    public function deleteUserAlert(){

    }

}
