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

//Route::middleware(['auth'])->group(function () {
    ## LOGOUT ##
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    ## PROJECT ##
    Route::resource('/project', 'ProjectsController')->except(['show']);
    ## PROJECT ##
    Route::resource('/task', 'TasksController')->except(['show']);
    ## MAIN VIEW ##
    Route::get('/', function () {
        return view('layouts.index');
    });

//});
