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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*PostController*/
Route::get('/post_create', 'PostController@create')->name('post_create');
Route::post('/post_create','PostController@store')->name('post_store');
Route::get('/post_index','PostController@index')->name('post_index');
Route::get('/post_edit/{id}','PostController@edit')->name('post_edit');
Route::post('/post_update/{id}','PostController@update')->name('post_update');
Route::get('/post_delete/{id}','PostController@destroy')->name('post_delete');

/*End PostController*/

/*UserController*/
Route::get('/profile/{id}','UserController@show')->name('profile');
/*End UserController*/

/*start CategoryController*/
Route::get('/cat_create', 'CategoryController@create')->name('cat_create');
Route::post('/cat_create','CategoryController@store')->name('cat_store');
Route::get('/cat_edit/{id}','CategoryController@edit')->name('cat_edit');
Route::post('/cat_edit/{id}','CategoryController@update')->name('cat_update');
Route::get('/cat_delete/{id}','CategoryController@destroy')->name('cat_delete');
/*End CategoryControllre*/

/*start ImageController*/
/*Route::get('/image','ImageController@create')->name('image_create');*/
/*Route::post('image','ImageController@store')->name('image_store');*/
/*End ImageController*/