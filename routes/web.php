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
        
      
         Route::get('exams/{id}/give/', [StudentController::class, 'give']);
        
      
     });
 });
 Route::group(['middleware' => 'teacher'], function () {
    Route::group(['prefix'=>'teacher'], function(){
        Route::get('/alltest', [TeacherController::class, 'index'])->name('alltest');
        Route::get('/addtest', [TeacherController::class, 'addtest'])->name('addtest');
        Route::post('/savetest', [TeacherController::class, 'savetest'])->name('savetest');
        Route::get('/edittest', [TeacherController::class, 'edittest'])->name('edittest');
        Route::get('/updatetest', [TeacherController::class, 'updatetest'])->name('updatetest');
        Route::get('/deletetest', [TeacherController::class, 'deletetest'])->name('deletetest');
        // -------------------------------------------------------------------------------------------------------
        Route::get('/allquestion', [TeacherController::class, 'index'])->name('allquestion');
        Route::get('/addquestion/{id}', [TeacherController::class, 'addquestion'])->name('addquestion');
        Route::post('/savequestion/{id}', [TeacherController::class, 'savequestion'])->name('savequestion');
        Route::get('/getquestionswithtestdetails/{id}', [TeacherController::class, 'getquestionswithtestdetails'])->name('getquestionswithtestdetails');
        Route::get('/editquestion/{id}', [TeacherController::class, 'editquestion'])->name('editquestion');
        Route::post('/updatequestion/{id}', [TeacherController::class, 'updatequestion'])->name('updatequestion');
        Route::get('/deletequestion/{id}', [TeacherController::class, 'deletequestion'])->name('deletequestion');
     
    });
});