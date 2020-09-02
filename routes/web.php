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
    ## ADMIN ##
    Route::namespace('Admin')->group(function () {
        ## PROJECT ##
        Route::resource('/project', 'ProjectController')->except(['show']);
        ## TASK ##
        Route::resource('/task', 'TaskController')->except(['show']);
        ## USER ##
        Route::get('/user', 'UserController')->name('users');
        #
        Route::get('/admin', function () {
            return view('layouts.admin.index'); })->name('admin');
    });
});

Route::namespace('Main')->group(function () {
    ## MAIN ##
    Route::get('/', 'SiteController@index')->name('main');
    ## TASK ##
    Route::get('/task/show/{id}', 'SiteController@taskShow')->name('taskShow');
    Route::get('/task/list/{id}/{status}', 'SiteController@taskList')->name('taskList');
    ## PROJECT ##
    Route::get('/project/show', 'SiteController@projectShow')->name('projectShow');
});

##DOWNLOAD##
Route::get('/downloadFile/{name}', 'Admin\TaskController@downloadFile')->name('downloadFile');
