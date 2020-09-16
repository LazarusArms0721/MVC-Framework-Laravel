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


Route::get('/', 'PagesController@getIndex')->name('pages.index');
Route::get('/about', 'PagesController@getAbout')->name('pages.about');

//Assignments
Route::get('/assignments', 'PagesController@getAssignments')->name('pages.assignments');
Route::get('/assignments/create', 'PagesController@createAssignment')->middleware('auth');;
Route::post('/assignment-action', 'PagesController@storeAssignment')->middleware('auth');;
Route::delete('/assignments/delete', 'PagesController@deleteAssignment')->middleware('auth');;

//Filter op basis van GET (assignment=value) in url.
Route::get('/assignment-filter', 'PagesController@assignmentFilter');
//update
//delete

Route::get('/blog', 'PagesController@getBlog')->name('pages.blog');
Route::get('/blog/create', 'PagesController@createBlog')->middleware('auth');;
Route::post('/blog-action', 'PagesController@storeBlog')->middleware('auth');;

Route::get('/contact', 'ContactController@showForm')->name('contact.show');
Route::get('/contact/create', 'ContactController@createEntry');
Route::post('/contact-action', 'ContactController@storeContact');


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


