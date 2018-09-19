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

//Route::get('/', function () {
//    return view('/main');
//});
Route::get('/','MainController@index')->name('main');
Route::get('/main','MainController@index')->name('main');
Route::get('/admin','AdminController@index')->name('admin');
Route::post('/postCategory', 'AdminController@postCategory')->name('admin.postCategory');
Route::post('/delCategory', 'AdminController@delCategory')->name('admin.delCategory');
Route::post('/postProduct', 'AdminController@postProduct')->name('admin.postProduct');
Route::post('/delProduct', 'AdminController@delProduct')->name('admin.delProduct');
Auth::routes();
Route::get('/about','AboutController@index')->name('about');

Route::get('/home', 'HomeController@index')->name('home');
