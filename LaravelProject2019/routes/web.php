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

//
// HOME
//
Route::get('/', 'PagesController@getIndex')->name('pages.index');

//
// ASSIGNMENTS
//
Route::get('/assignments', 'PagesController@getAssignments')->name('pages.assignments');
Route::get('/assignments/create', 'PagesController@createAssignment')->middleware('auth');
Route::post('/assignment-action', 'PagesController@storeAssignment')->middleware('auth');
Route::delete('/assignments/delete', 'PagesController@deleteAssignment')->middleware('auth');
Route::get('/assignments/{assignment}', 'PagesController@showAssignment')->middleware('auth');
Route::post('/assignments/{assignment}/edit', 'PagesController@updateAssignment')->name('pages.assignment_update')->middleware('auth');

//Filter op basis van GET (assignment=value) in url.
Route::get('/assignment-filter', 'PagesController@assignmentFilter');
//update
//delete

//
//  BLOG
//
Route::get('/blog', 'PagesController@getBlogs')->name('pages.blog');
Route::get('/blog-filter', 'PagesController@getBlogFilter')->name('pages.blog_results');
Route::get('/blog/create', 'PagesController@createBlog')->middleware('auth');
Route::post('/blog-action', 'PagesController@storeBlog')->middleware('auth');
Route::get('/blog-edit/{id}',);


//
// OTHER
//

Route::get('/about', 'PagesController@getAbout')->name('pages.about');
Route::get('/contact', 'ContactController@showForm')->name('contact.show');
Route::get('/contact/create', 'ContactController@createEntry');
Route::post('/contact-action', 'ContactController@storeContact');


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


