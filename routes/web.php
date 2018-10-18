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
Route::post('queries', 'FoodListingController@foodEaten');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/log', 'LogController@index');
Route::get('/log/search', 'LogController@search');

Route::resource('foods', 'FoodListingController');

Route::resource('dietPlan', 'DietPlanController');

Route::resource('profile', 'ProfileController');

Route::get('/', 'HomeController@index');
