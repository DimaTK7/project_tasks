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

## REGISTER ##
Auth::routes();
## LOGOUT ##
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    ## MANAGERIAL ##
    Route::namespace('Managerial')->group(function () {
        ## PROJECT ##
        Route::resource('/project', 'ProjectsController')->except(['show']);
        ## TASK ##
        Route::resource('/task', 'TasksController')->except(['show']);
        ## USER ##
        Route::get('/user', 'UsersController')->name('users');
        #
        Route::get('/managerial', function () {
            return view('layouts.managerial.index'); })->name('managerial');
    });
});

## MAIN ##
Route::get('/', 'Main\SiteController@index')->name('main');
## TASK ##
Route::get('/task/new', 'Main\SiteController@taskNew')->name('taskNew');
Route::get('/task/progress', 'Main\SiteController@taskProgress')->name('taskProgress');
Route::get('/task/done', 'Main\SiteController@taskDone')->name('taskDone');
Route::get('/task/show/{id}', 'Main\SiteController@taskShow')->name('taskShow');
Route::get('/task/list/{id}/{status}', 'Main\SiteController@taskList')->name('taskList');
## PROJECT ##
Route::get('/project/show', 'Main\SiteController@projectShow')->name('projectShow');
##DOWNLOAD##
Route::get('/downloadFile/{name}', 'Managerial\TasksController@downloadFile')->name('downloadFile');
