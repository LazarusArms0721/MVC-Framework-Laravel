<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

//        $userRoles = $user->hasRoles($user->roles);

        $blogs = Blog::all()->where('user_id', $user->id);


        return view('user_dashboard', compact('user', 'blogs'));
    }

    public function editUserDashboard(User $user){
        $user = User::find($user->id);


        return view('user_dashboard_single', compact('user'));
    }

    public function updateUserDashboard(Request $request, User $user){

        $userUpdate = User::where('id', $user->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);


        if ($userUpdate){

            return redirect('/dashboard/user')->with('success', 'You have updated your profile!');
        }


        return back()->withInput();
    }

    public function deleteUserDashboard(User $user){

        $user->delete();

        return redirect('/')->with('success', 'You have deleted your profile.');
    }


    public function showDashboard(){

        $assignments = Assignment::orderBy('created_at', 'DESC')->paginate(10);
        $blogs = Blog::orderBy('created_at','DESC')->paginate(10);
        $users = User::all();
        $notifications = auth()->user()->unreadNotifications;


        return view('dashboard', compact('blogs','assignments','users', 'notifications'));
    }

    public function markNotification(Request $request){
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request-input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function createUser(){

        return view('pages.create_user');
    }

    public function storeUser(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();

        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('/dashboard')->with('success', 'User was created!');

    }

    public function getUser(User $user){
        $user = User::find($user->id);
        $rolenames = Role\UserRole::getRoleList();
        $rolevalues = Role\UserRole::getRoleList();

        $roles = array_combine($rolenames, $rolevalues);


        return view('user_single', compact('user', 'roles'));


    }

    public function updateUser(Request $request,  User $user ){



        $userUpdate = User::where('id', $user->id)->update([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'roles' => json_encode($request->input('roles')),

        ]);


        if ($userUpdate){

            return redirect('/dashboard')->with('success', 'User updated sucessfully');
        }


        return back()->withInput();
    }

    public function deleteUser(User $user){


        $user->delete();

        return redirect('/dashboard');

    }

//    public function deleteUserAlert(){
//
//    }

    public function getContacts(){
        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(10);

        return view('dashboard_contacts', compact('contacts'));
    }



}
