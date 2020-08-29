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
        ## PROJECT ##
        Route::resource('/task', 'TasksController')->except(['show']);
        Route::get('/downloadFile/{name}', 'TasksController@downloadFile')->name('downloadFile');
        Route::get('/user', 'UsersController')->name('users');
        Route::get('/managerial', function () {
            return view('layouts.managerial.index'); })->name('managerial');
    });
});

## MAIN ##
Route::get('/', 'Main\SiteController@index')->name('site');
