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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('student','App\Http\Controllers\StudentController');
Route::post('student-list','App\Http\Controllers\StudentController@studentList');
Route::resource('marks','App\Http\Controllers\MarksReportController');
Route::post('mark-list','App\Http\Controllers\MarksReportController@searchList');


require __DIR__.'/auth.php';
