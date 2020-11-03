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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/business-news', function () {
    return view('frontend.business-news');
});

Route::get('/news-on-click', function () {
    return view('frontend.news-on-click');
});

Route::get('/startups', function () {
	return view('frontend.startups');
});

Route::get('/startup', function () {
	return view('frontend.startup');
});

Route::get('/employee', function () {
	return view('frontend.employee');
});

Route::get('/freelancers', function () {
    return view('frontend.freelancers');
});
