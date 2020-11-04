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

// Route::get('/', function () {
//     return view('welcome');
// });

// Frontend area
Route::get('/', 'FrontController@index')->name('home');

Route::get('/business-news', "FrontController@businessNews")->name("businessNews");

Route::get('/news-on-click', "FrontController@newsDetail")->name("newsDetail");

Route::get('/startups', "FrontController@startups")->name("startups");

Route::get('/startup', "FrontController@startup")->name("startup");

Route::get('/freelancers', 'FrontController@freelancers')->name("freelancers");

Route::get('/employee', "FrontController@employee")->name("employee");

// Backend area
