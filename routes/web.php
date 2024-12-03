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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//index
Route::get('/students', 'StudentController@index')->name('students.index');

//create
Route::get('/students/create', 'StudentController@create')->name('students.create');

//store
Route::post('/students', 'StudentController@store')->name('students.store');

//show
Route::get('/students/{student}', 'StudentController@show')->name('students.show');

//edit
Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');

//update
Route::put('/students/{student}', 'StudentController@update')->name('students.update');

//delete or destroy
Route::delete('/students/{student}', 'StudentController@destroy')->name('students.destroy');

//subject
Route::resource('subjects','SubjectController');

//halls
Route::resource('halls', 'HallController');

//timetables
Route::resource('timetables', 'TimetableController');

//groups
Route::resource('groups', 'LectureGroupController');
