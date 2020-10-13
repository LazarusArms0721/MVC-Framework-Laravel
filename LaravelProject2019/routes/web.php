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

// ADD ROLE function

Route::get('/add/role/editor', function(){


});

//
// HOME
//
Route::get('/',
            'PagesController@getIndex')
                ->name('pages.index');

//
// Dashboard
//

Route::get('/dashboard',
            'DashboardController@showDashboard')
                ->middleware('auth');

Route::get('/dashboard/{user}/edit',
            'DashboardController@getUser')
                ->middleware('auth');

Route::put('/dashboard/{user}',
            'DashboardController@updateUser')
                ->middleware('auth');

Route::get('/dashboard/{user}/delete',
            'DashboardController@deleteUser')
                ->middleware('auth');

//
// ASSIGNMENTS
//

// SHOW AND CREATE NEW
Route::get('/assignments',
            'PagesController@getAssignments')
                ->name('pages.assignments');

Route::get('assignments/create',
             'PagesController@createAssignment')->middleware('check_user_role:' . \App\Role\UserRole::ROLE_ADMIN);

//
//Route::get('assignments/create',
//            'PagesController@createAssignment')->middleware('auth');

// POST CREATED ASSIGNMENT
Route::post('/assignment-action',
            'PagesController@storeAssignment')
                ->middleware('auth');
// DELETE ASSIGNMENT
Route::get('/assignments/{assignment}/delete',
            'PagesController@deleteAssignment')
                ->middleware('auth');

// SHOW AND UPDATE ASSIGNMENTS
Route::get('/assignments/{assignment}/edit',
            'PagesController@showAssignment')
                ->middleware('auth');

Route::put('/assignments/{assignment}',
            'PagesController@updateAssignment')
                ->middleware('auth');

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

Route::get('/blog/create',
            'PagesController@createBlog')
                ->middleware('auth');

Route::post('/blog-action',
            'PagesController@storeBlog')
                ->middleware('auth');

Route::get('/blog/{blog}/edit',
            'PagesController@showBlog')
                ->middleware('auth');

Route::put('/blog/{blog}',
            'Pages
            Controller@updateBlog')
                ->middleware('auth');

Route::get('/blog/{blog}/delete',
    'PagesController@deleteBlog')
    ->middleware('auth');


//
// OTHER
//

Route::get('/about', 'PagesController@getAbout')->name('pages.about');
Route::get('/contact', 'ContactController@showForm')->name('contact.show');
Route::get('/contact/create', 'ContactController@createEntry');
Route::post('/contact-action', 'ContactController@storeContact');


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


