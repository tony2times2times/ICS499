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

Auth::routes();

Route::get('queries', 'QueryController@search');
Route::get('showAll', 'QueryController@showAll');
Route::post('queries', 'FoodListingController@foodEaten');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/log', 'LogController@index');
Route::get('/log/search', 'LogController@search');

Route::resource('foods', 'FoodListingController');

Route::resource('dietPlan', 'DietPlanController');
Route::post('dietPlan', 'DietPlanController@update');
Route::post('dietPlan', 'DietPlanController@store');

Route::resource('account', 'AccountController');
Route::resource('profile', 'ProfileController');

Route::get('/', 'HomeController@index');

Route::get('/admin', 'AdminController@index')
    ->middleware('is_admin')
    ->name('admin');
Route::post('createAdmin', 'AdminController@create');

Route::resource('feedback', 'FeedbackController');
Route::resource('adminFeedback', 'AdminFeedbackController');
