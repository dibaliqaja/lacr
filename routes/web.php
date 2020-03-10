<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Route with resource
    Route::resource('/crud', 'StudentsController');

    // Route manual
    Route::get('/lecturers','LecturerController@index')->name('lect.index');
    Route::get('/lecturers/create','LecturerController@create')->name('lect.create');
    Route::post('/lecturers','LecturerController@store')->name('lect.store');
    Route::get('/lecturers/{id}/edit','LecturerController@edit')->name('lect.edit');
    Route::patch('/lecturers/{id}','LecturerController@update')->name('lect.update');
    Route::delete('/lecturers/{id}','LecturerController@destroy')->name('lect.destroy');
});

Auth::routes();
