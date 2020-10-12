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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/acasa', 'Home@index');


Route::get('locale/{locale}', function ($locale){
    if(array_key_exists($locale, Config::get('app.languages'))){
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

