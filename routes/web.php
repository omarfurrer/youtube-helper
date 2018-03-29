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
    $todos = [
       
    ];
    $todos = [
        'Get Shit 1',
        'Get Shit 2',
        'Get Shit 3',
        'Get Shit 4',
        'Get Shit 5'
    ];
    return view('home',compact('todos'));
});

Auth::routes();

