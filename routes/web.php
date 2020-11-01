<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use App\Contact;
use App\Notifications\TaskCompleted;





// ADD ROLE function
//
//Route::get('/add/role/editor', function(){
//
//    $newrole = auth()->user();
//
//
//
//
//    return $newrole->addRole('ROLE_EDITOR')->save();
//
//
//})->middleware('auth');
//
//Route::get('/add/role/admin', function(){
//
//    $newrole = auth()->user();
//
//
//
//
//    return $newrole->addRole('ROLE_ADMIN')->save();
//
//
//})->middleware('auth');

//
// HOME
//


Route::get('/', 'PagesController@getIndex', function(){


//    User::find(12)->notify(new TaskCompleted());


})->name('pages.index');

//
// Dashboard
//

Route::get('/dashboard',
            'DashboardController@showDashboard')
                ->middleware('auth')->middleware('check_user_role:' . App\Role\Userrole::ROLE_EDITOR);

Route::get('/dashboard/{user}/edit',
            'DashboardController@getUser')
                ->middleware('auth')->middleware('check_user_role:' . App\Role\Userrole::ROLE_ADMIN);

Route::put('/dashboard/{user}/update',
            'DashboardController@updateUser')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

Route::get('/dashboard/{user}/delete',
            'DashboardController@deleteUser')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

Route::get('/dashboard/user/create',
            'DashboardController@addUser')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

//Route::get('/dashboard/notifications',
//            'NotificationsController@getIndex');

Route::get('/dashboard/contact',
            'DashboardController@getContacts')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

Route::get('/dashboard/contact/{contact}/delete',
            'DashboardController@deleteContact')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

//
//  User Dashboard
//

Route::get('/dashboard/user', 'DashboardController@showUserDashboard')->middleware('auth');

Route::get('/dashboard/user/{user}/edit', 'DashboardController@editUserDashboard')->middleware('auth');

Route::put('/dashboard/user/{user}/update', 'DashboardController@updateUserDashboard')->middleware('auth');

Route::get('/dashboard/user/{user}/delete', 'DashboardController@deleteUserDashboard')->middleware('auth');


//
// ASSIGNMENTS
//

// SHOW AND CREATE NEW
Route::get('/assignments',
            'PagesController@getAssignments')
                ->name('pages.assignments');

Route::get('/assignments/{assignment}',
            'Pagescontroller@getAssignment');

Route::get('/assignment/create', 'PagesController@createAssignment'
             )->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

//
//Route::get('assignments/create',
//            'PagesController@createAssignment')->middleware('auth');

// POST CREATED ASSIGNMENT
Route::post('/assignment-action',
            'PagesController@storeAssignment')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);
// DELETE ASSIGNMENT
Route::get('/assignments/{assignment}/delete',
            'PagesController@deleteAssignment')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

// SHOW AND UPDATE ASSIGNMENTS
Route::get('/assignments/{assignment}/edit',
            'PagesController@showAssignment')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_EDITOR);

Route::put('/assignments/{assignment}',
            'PagesController@updateAssignment')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_EDITOR);

//Filter op basis van GET (assignment=value) in url.
Route::get('/assignment-filter',
            'PagesController@assignmentFilter');




//
//  BLOG
//
Route::get('/blog',
            'PagesController@getBlogs')
                ->name('pages.blog');

Route::get('blog/{blog}/single',
            'PagesController@getSingleBlog');

Route::get('/blog-filter',
            'PagesController@getBlogFilter')
                ->name('pages.blog_results');

Route::get('/date-filter',
            'PagesController@getDateFilter')
                ->name('pages.blog_results_date');

Route::get('/blog/create',
            'PagesController@createBlog')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

Route::post('/blog-action',
            'PagesController@storeBlog')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

Route::get('/blog/{blog}/edit',
            'PagesController@showBlog')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_EDITOR);

Route::put('/blog/{blog}/update',
            'PagesController@updateBlog')
                ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_EDITOR);

Route::get('/blog/{blog}/delete',
    'PagesController@deleteBlog')
    ->middleware('auth')->middleware('check_user_role:' . \App\Role\Userrole::ROLE_ADMIN);

//
// Notifications
//

Route::post('/notifications/read', 'DashboardController@markNotification');


//
// OTHER
//

Route::get('/contact', 'ContactController@showForm')->name('contact.show');
Route::get('/contact/create', 'ContactController@createEntry');
Route::post('/contact-action', 'ContactController@storeContact');


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



//Auth::routes();



