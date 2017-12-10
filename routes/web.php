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
   // return view('homepage');
    return 'index';
});

Route::get('/test', function() {
   // return view('homepage');
    return view('profile.test');
});

Route::get('/add-book', 'BookController@create')->name('add_book');
Route::post('/add-book', 'BookController@store');
Route::post('/upload-images', 'BookController@uploadImages');
Route::post('/delete-image/{image_name}', 'BookController@deleteImage');

Route::get('/book-details', function() {
    return view('book.book_details');
});

Route::get('/edit-profile', 'ProfileController@edit')->name('update_profile');
Route::post('/edit-profile', 'ProfileController@update');

Route::get('/detail-profile/{id}', 'ProfileController@show');

Route::group(['prefix' => 'admin'], function() {
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::post('categories', 'CategoryController@store');
    Route::post('category/{id}', 'CategoryController@update');
    Route::post('category/delete/{id}', 'CategoryController@delete');

    Route::get('cities', 'CityController@index')->name('cities');
    Route::post('cities', 'CityController@store')->name('add_city');
    Route::post('city/{id}', 'CityController@update')->name('update_city');
    Route::post('city/delete/{id}', 'CityController@delete')->name('delete_city');
    Route::post('city/{id}/get_all_district', 'CityController@getAllDistrict');

    Route::post('districts', 'DistrictController@store')->name('add_district');
    Route::post('district/delete/{id}', 'DistrictController@delete')->name('delete_district');
    Route::post('district/{id}', 'DistrictController@update')->name('update_district');

    Route::get('publishers', 'PublisherController@index')->name('publishers');
    Route::get('publishers/add', 'PublisherController@create')->name('add_publisher');
    Route::post('publishers/add', 'PublisherController@store');
    Route::get('publisher/edit/{id}', 'PublisherController@edit')->name('edit_publisher');
    Route::post('publisher/edit/{id}', 'PublisherController@update')->name('update_publisher');
    Route::post('publisher/delete/{id}', 'PublisherController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
