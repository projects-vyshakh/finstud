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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['web','auth']], function(){
    Route::any('/students', 'StudentsController@index')->name('students');
    Route::any('/add-student', 'StudentsController@showAddStudent')->name('add-student');
    Route::any('/edit-student', 'StudentsController@showEditStudent')->name('edit-student');
    Route::any('/delete-student', 'StudentsController@deleteStudent')->name('delete-student');
    Route::any('/store-student', 'StudentsController@storeStudent')->name('store-student');
    Route::any('/update-student', 'StudentsController@updateStudent')->name('update-student');

    Route::any('/marks', 'MarksController@index')->name('marks');
    Route::any('/add-marks', 'MarksController@showAddMarks')->name('add-marks');
    Route::any('/store-marks', 'MarksController@storeMarks')->name('store-marks');
    Route::any('/edit-marks', 'MarksController@showEditMarks')->name('edit-marks');
    Route::any('/update-marks', 'MarksController@updateMarks')->name('update-marks');
    Route::any('/delete-marks', 'MarksController@deleteMarks')->name('delete-marks');

});
