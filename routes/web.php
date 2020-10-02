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

Route::get('/', 'QuestionController@all')->name('welcome');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('question/{id}/view', 'QuestionController@single')->name('question.view');
    Route::post('question/{id}/submit', 'SubmissionController@submit')->name('question.submit');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('guidelines', function(){
        return view('guidelines');
    })->name('guidelines');
});

Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('admin/question/new', 'QuestionController@add')->name('question.create');
    Route::post('admin/question/new', 'QuestionController@create');
    Route::post('question/{id}/delete', 'QuestionController@delete')->name('question.delete');
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/submission/{id}/view', 'AdminController@detail')->name('admin.submission');
});



