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

// Frontend area
Route::get('/', 'FrontController@index')->name('home');

Route::get('/business-news', "FrontController@businessNews")->name("businessNews");

//Route::get('/news-on-click', "FrontController@newsDetail")->name("newsDetail");
Route::get('/business-news/{slug?}', "FrontController@newsDetail")->name("newsDetail");


Route::get('/find-an-investor', "FrontController@findAnInvestor")->name('findAnInvestor');

Route::get('/find-an-employer', "FrontController@findAnEmployer")->name('findAnEmployer');
Route::get('ajaxRequest', 'FrontController@ajaxRequest')->name('ajaxRequest');

Route::get('ajaxPortfolio', 'FrontController@ajaxPortfolio')->name('ajaxPortfolio');

Route::post('ajaxQuizUserAnswer', 'FrontController@ajaxQuizUserAnswer')->name('ajaxQuizUserAnswer');

Route::prefix('freelancers')->group(function () {
    Route::get('{category_id?}', 'FreelancerController@index')->name('front.freelancer.index')->where('category_id', '[0-9]*');
    Route::get('show/{id}', 'FreelancerController@show')->name('front.freelancer.show');
    Route::get('create', 'FreelancerController@create')->name('front.freelancer.create');
    Route::post('store', 'FreelancerController@store')->name('front.freelancer.store');
    Route::get('pricing/{id}', 'FreelancerController@pricing')->name('front-freelancer.pricing');
});

Route::prefix('pricing')->group(function() {
    Route::post('startup/pay', 'PricingController@startup')->name('pricing.startup.pay');
    Route::post('freelancer/pay', 'PricingController@freelancer')->name('pricing.freelancer.pay');
});

// Backend area

Auth::routes(['verify' => true]);

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

        Route::get('/main-news', 'Admin\BusinessNewsController@mainNews')->name('main-news');
        Route::put('/business-news-comment/{id?}', 'Admin\BusinessNewsController@postComment')->name('business-news-comment');
        Route::get('/business-news-comment-delete/{id?}', 'Admin\BusinessNewsController@postCommentDelete')->name('business-news-comment-delete');
        Route::resource('/business-news', 'Admin\BusinessNewsController');
        Route::resource('/freelance-categories', 'Admin\FreelanceCategories');
        Route::resource('/freelancers', 'Admin\FreelancerController');
        Route::resource('/quiz', 'Admin\QuizController');
        Route::resource('/quiz-answers', 'Admin\QuizAnswersController');
        Route::resource('/partner', 'Admin\PartnerController');

        Route::resource('pricing', 'Admin\PricingController');

        Route::resource('contacts', 'Admin\ContactsController');
    });
});
Route::get('/freelancers', "FrontController@freelancers")->name("freelancers");

Route::prefix('startup')->group(function() {
    Route::get('', 'StartupController@index')->name('front-startup.index');
    Route::get('{category}', 'StartupController@category')->name('startup.category')->where('category',  '[A-Za-z]+_*[A-Za-z]*');
    Route::get('create-new', 'StartupController@create')->name('front-startup.create');
    Route::post('', 'StartupController@store')->name('front-startup.store');
    Route::get('show/{id}', 'StartupController@show')->name('front-startup.show');
    Route::get('pricing/{id}', 'StartupController@pricing')->name('front-startup.pricing');
});

Route::middleware('auth')->group(function () {

    Route::prefix('account')->group(function () {

        Route::get('/{user_id?}', 'AccountController@index')->where('user_id', '[0-9]*')->name('account');

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

        Route::get('/personal-data/{user_id?}/{user_name?}', 'AccountController@pesonalData')->name('account.personalData');
        Route::get('/personal/edit/{user_id}/{user_name?}', 'AccountController@personalDataEdit')->name('account.personalDataEdit');
        Route::put('personal-data/update/{user_id}', 'AccountController@personalDataUpdate')->name('account.personalDataUpdate');


    });

});

Route::resource('temp', 'TempController');
