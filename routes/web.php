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

//Route::get('/news-on-click', "FrontController@newsDetail")->name("newsDetail");
Route::get('/business-news/{slug?}', "FrontController@newsDetail")->name("newsDetail");

Route::get('/startups', "FrontController@startups")->name("startups");

Route::get('/startup', "FrontController@startup")->name("startup");

Route::get('/freelancers/{category_id?}', "FrontController@freelancers")->name("freelancers");
// Route::get('/freelancers', "FrontController@freelancers")->name("freelancers");
// Route::get('freelancer-filter/{category_id?}', "FrontController@freelancerFilter")->name('freelancerFilter');

// Route::get('/employee', "FrontController@employee")->name("employee");
Route::get('/freelancer/{id?}/{name?}', "FrontController@employee")->name("freelancer");

Route::get('/find-an-investor', "FrontController@findAnInvestor")->name('findAnInvestor');

Route::get('/find-an-employer', "FrontController@findAnEmployer")->name('findAnEmployer');
Route::get('ajaxRequest', 'FrontController@ajaxRequest')->name('ajaxRequest');

Route::get('ajaxPortfolio', 'FrontController@ajaxPortfolio')->name('ajaxPortfolio');

Route::post('ajaxQuizUserAnswer', 'FrontController@ajaxQuizUserAnswer')->name('ajaxQuizUserAnswer');

// Backend area

Auth::routes();

Route::middleware(['auth', 'staff_roles'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', 'Admin\HomeController@index')->name('admin');

        Route::resource('/user', 'Admin\UserController');
        Route::resource('/role', 'Admin\RoleController');
        Route::resource('/startup', 'Admin\StartupController');
        Route::resource('/startup-category', 'Admin\StartupCategoryController');

        Route::resource('/business-news', 'Admin\BusinessNewsController');
        Route::resource('/freelance-categories', 'Admin\FreelanceCategories');	
        Route::resource('/freelancers', 'Admin\FreelancerController');
        Route::resource('/portfolios', 'Admin\PortfolioController');
        Route::resource('/quiz', 'Admin\QuizController');
        Route::resource('/quiz-answers', 'Admin\QuizAnswersController');
    });
});
