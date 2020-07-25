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

Route::get('/membership',[
	'as' => 'membership',
	'uses' => 'HomeController@membership'
]);

Route::post('/login-web',[
	'as' => 'login_web',
	'uses' => 'HomeController@login_web'
]);
Route::get('/logout-web',[
	'as' => 'logout_web',
	'uses' => 'HomeController@logout_web'
]);
Route::get('/dang-ky',[
	'as' => 'registeruser',
	'uses' => 'HomeController@register_page'
]);
Route::post('/registration',[
	'as' => 'register_web',
	'uses' => 'HomeController@register_web'
]);
Route::post('/forgot_password',[
	'as' => 'forgot_web',
	'uses' => 'HomeController@forgot_web'
]);
Route::post('/check_pin',[
	'as' => 'check_pin',
	'uses' => 'HomeController@check_pin'
]);
Route::post('/confirm-registration',[
	'as' => 'confirm_register',
	'uses' => 'HomeController@confirm_register'
]);

Route::post('/update_password',[
	'as' => 'update_password',
	'uses' => 'HomeController@update_password'
]);


Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});

/*MANH_TU*/
//Route::get('register', 'UserController@regis')->name('regis');

Route::post('register', 'UserController@register')->name('user.register');

Route::post('login', 'UserController@login')->name('user.login');

Route::prefix('/')->middleware('auth')->group(function() {
	Route::get('membership-type', 'MembershipTypeController@list')->name('membership_type.list');

	Route::post('register-membership', 'UserController@registerMembership')->name('user.register_membership');
});

Route::get('membership-type', 'MembershipTypeController@list')->name('membership_type.list');
/*END MANH_TU*/
