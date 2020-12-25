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

Route::get('/freelancers/{category_id?}', "FrontController@freelancers")->name("freelancers");
// Route::get('/freelancers', "FrontController@freelancers")->name("freelancers");
// Route::get('freelancer-filter/{category_id?}', "FrontController@freelancerFilter")->name('freelancerFilter');

// Route::get('/employee', "FrontController@employee")->name("employee");
Route::get('/freelancer/{id?}', "FrontController@employee")->name("freelancer");

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
        Route::post('/startup/approve/{id}', 'Admin\StartupController@approve')->name('startup.approve');
        Route::post('/startup/top/{id}', 'Admin\StartupController@top')->name('startup.top');
        Route::resource('/startup', 'Admin\StartupController');
        Route::get('/startup-pending', 'Admin\StartupController@pending')->name('startup.pending');
        Route::resource('/startup-category', 'Admin\StartupCategoryController');

        Route::resource('/business-news', 'Admin\BusinessNewsController');
        Route::resource('/freelance-categories', 'Admin\FreelanceCategories');	
        Route::resource('/freelancers', 'Admin\FreelancerController');
        Route::resource('/portfolios', 'Admin\PortfolioController');
        Route::resource('/quiz', 'Admin\QuizController');
        Route::resource('/quiz-answers', 'Admin\QuizAnswersController');
    });
});
Route::get('/freelancers', "FrontController@freelancers")->name("freelancers");

Route::prefix('startup')->group(function() {
    Route::get('', 'StartupController@index')->name('front-startup.index');
    Route::get('{category}', 'StartupController@category')->name('startup.category')->where('category',  '[A-Za-z]+_*[A-Za-z]*');
    Route::get('create-new', 'StartupController@create')->name('front-startup.create');
    Route::post('', 'StartupController@store')->name('front-startup.store');
    Route::get('show/{id}', 'StartupController@show')->name('front-startup.show');
});

Route::middleware('auth')->group(function () {

    Route::prefix('account')->group(function () {

        Route::get('/', 'AccountController@index')->name('account');

        Route::prefix('startup')->group(function () {
            Route::get('/', 'Account\StartupController@index')->name('account.startup.index');
            Route::get('/pending', 'Account\StartupController@pending')->name('account.startup.pending');
            Route::get('/archive', 'Account\StartupController@archive')->name('account.startup.archive');
            Route::get('/edit/{id}', 'Account\StartupController@edit')->name('account.startup.edit');
            Route::put('/update/{id}', 'Account\StartupController@update')->name('account.startup.update');
            Route::delete('/destroy/{id}', 'Account\StartupController@destroy')->name('account.startup.destroy');
        });

        Route::prefix('freelancer')->group(function () {
            Route::get('/', 'Account\FreelancerController@index')->name('account.freelancer.index');
            Route::get('/pending', 'Account\FreelancerController@pending')->name('account.freelancer.pending');
            Route::get('/archive', 'Account\FreelancerController@archive')->name('account.freelancer.archive');
            Route::get('/edit/{id}', 'Account\FreelancerController@edit')->name('account.freelancer.edit');
            Route::put('/update/{id}', 'Account\FreelancerController@update')->name('account.freelancer.update');
            Route::delete('/destroy/{id}', 'Account\FreelancerController@destroy')->name('account.freelancer.destroy');
        });


    });

});

Route::resource('temp', 'TempController');
