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

Route::get('/', 'FoodListingController@index');

Auth::routes();

Route::get('queries', 'QueryController@search');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('foods', 'FoodListingController');

Route::resource('dietPlan', 'DietPlanController');