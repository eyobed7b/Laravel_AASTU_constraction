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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
Route::resource('companies','CompaniesController');
Route::resource('projects','ProjectsController');
Route::get('projects/craete/{{company_id}}','ProjectsController@create');
Route::resource('Roles','RolessController');
Route::resource('tasks','TasksController');
Route::resource('Users','UsersController');
Route::resource('comments','CommentsController');
});

