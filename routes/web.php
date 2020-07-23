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
Route::get('/', [
	'as' => 'welcome',
	'uses' => 'HomeController@welcome'
]);
Route::get('/events', [
	'as' => 'events',
	'uses' => 'HomeController@events'
]);
Route::get('/spa', [
	'as' => 'spa',
	'uses' => 'HomeController@spa'
]);
Route::get('/food-drink', [
	'as' => 'fooddrink',
	'uses' => 'HomeController@fooddrink'
]);
Route::get('/about', [
	'as' => 'about',
	'uses' => 'HomeController@about'
]);
Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'HomeController@contact'
]);
Route::get('/single-room', [
	'as' => 'singleroom',
	'uses' => 'HomeController@singleroom'
]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
