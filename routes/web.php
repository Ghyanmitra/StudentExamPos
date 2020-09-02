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

// Route::get('/', function () {
//     return view('welcome');
// });

// Student route
Route::get('/', 'StudentsController@index')->name('homepage');
Route::post('/addstudent', 'StudentsController@store')->name('addstudent');
Route::get('/edit/{id}', 'StudentsController@edit')->name('edit');
Route::get('/delete/{id}', 'StudentsController@destroy')->name('destroy');
Route::post('/update', 'StudentsController@update')->name('updatestudent');

//Exam route
Route::get('/exam', 'ExamsController@index')->name('exam home');
Route::post('/addexam', 'ExamsController@store')->name('addexam');
Route::get('/examdelete/{id}', 'ExamsController@destroy')->name('deletexam');

//Student Exam route
Route::get('/studentexam', 'StudentExamsController@index');
