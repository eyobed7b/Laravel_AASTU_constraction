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
Route::resource('PM','PMController');
Route::resource('VPM','VpmController');
Route::resource('coordinator','CoordinatorController');
Route::resource('office','OfficeController');
Route::resource('archive','ArcController');
Route::resource('IDVP','IDVPController');

Route::resource('ReplayLetter','ReplayLetterController');

Route::get('projects/create/{company_id?}','ProjectsController@create');
Route::get('ReplayLetter/create/{company_id?}','ReplayLetterController@create');
Route::post('companies/adduser','CompaniesController@adduser')->name('companies.adduser');
Route::post('pm/adduser','PMController@adduser')->name('pm.adduser');
Route::post('VPM/adduser','VpmController@adduser')->name('VPM.adduser');
Route::post('coordinator/adduser','CoordinatorController@adduser')->name('coordinator.adduser');
Route::post('archive/adduser','ArcController@adduser')->name('arc.adduser');
Route::post('IDVP/adduser','IDVPController@adduser')->name('idvp.adduser');


Route::post('office/adduser','OfficeController@adduser')->name('office.adduser');


Route::resource('projects','ProjectsController');
Route::resource('ReplayLetter','ReplayLetterController');


Route::resource('Roles','RolessController');
//Route::get('projects/{{id}}','ProjectsController@store');
Route::resource('tasks','TasksController');
Route::resource('Users','UsersController');
Route::resource('comments','CommentsController');
Route::resource('replaycomments','ReplayCommentsController');
});

