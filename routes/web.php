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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function() {
	return view('homepage');
});

Route::get('/add-book', function() {
	return view('book.add_edit_book');
});

Route::get('/book-details', function() {
	return view('book.book_details');
});

Route::get('/edit-profile', function() {
	return view('profile.edit_profile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
