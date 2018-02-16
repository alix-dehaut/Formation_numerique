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

//front
Route::get('/', 'Frontcontroller@index')->name('home');

Route::get('post/{id}', 'Frontcontroller@show')->name('formation_stage');

Route::get('showByType/{post_type}', 'Frontcontroller@showByType')->name('showByType'); 

Route::get('contact', 'Frontcontroller@contactForm');

Route::post('sendEmail', 'Frontcontroller@sendEmail')->name('sendmail');

Route::any('search', 'Frontcontroller@search')->name('search');

//auth
Auth::routes();

// backoffice
Route::resource('admin/post', 'PostController')->middleware('auth');

Route::delete('postsDeleteAll', 'PostController@deleteAll')->name('postsDeleteAll');
