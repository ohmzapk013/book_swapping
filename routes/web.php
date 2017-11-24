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

Route::get('/add-book', 'BookController@create')->name('add_book');

Route::post('/add-book', 'BookController@store');

Route::get('/book-details', function() {
    return view('book.book_details');
});

Route::get('/edit-profile', function() {
    return view('profile.edit_profile');
});

Route::get('/detail-profile', function() {
    return view('profile.detail_profile');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::post('categories', 'CategoryController@store');
    Route::post('category/{id}', 'CategoryController@update')->name('update_category');
    Route::post('category/delete/{id}', 'CategoryController@delete')->name('update_category');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
