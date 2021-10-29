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

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/autologin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('autologin');


Route::group(['middleware' => 'student'], function () {
     Route::group(['prefix'=>'student'], function(){
         Route::get('/alltest', [StudentController::class, 'index'])->name('alltest');
      
     });
 });
 Route::group(['middleware' => 'teacher'], function () {
    Route::group(['prefix'=>'teacher'], function(){
        Route::get('/alltest', [TeacherController::class, 'index'])->name('alltest');
        Route::get('/addtest', [TeacherController::class, 'addtest'])->name('addtest');
        Route::get('/savetest', [TeacherController::class, 'savetest'])->name('savetest');
        Route::get('/edittest', [TeacherController::class, 'edittest'])->name('edittest');
        Route::get('/updatetest', [TeacherController::class, 'updatetest'])->name('updatetest');
        Route::get('/deletetest', [TeacherController::class, 'deletetest'])->name('deletetest');
        // -------------------------------------------------------------------------------------------------------
        Route::get('/allquestion', [TeacherController::class, 'index'])->name('allquestion');
        Route::get('/addquestion', [TeacherController::class, 'addquestion'])->name('addquestion');
        Route::get('/savequestion', [TeacherController::class, 'savequestion'])->name('savequestion');
        Route::get('/editquestion', [TeacherController::class, 'editquestion'])->name('editquestion');
        Route::get('/updatequestion', [TeacherController::class, 'updatequestion'])->name('updatequestion');
        Route::get('/deletequestion', [TeacherController::class, 'deletequestion'])->name('deletequestion');
     
    });
});