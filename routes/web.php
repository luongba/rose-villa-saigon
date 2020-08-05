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


Route::group(['middleware' => 'locale'], function() {
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
Route::get('/shop', [
	'as' => 'shop',
	'uses' => 'HomeController@shop'
]);
Route::get('/regular-member', [
	'as' => 'regularmember',
	'uses' => 'HomeController@regularmember'
]);
Route::get('/founder', [
	'as' => 'founder',
	'uses' => 'HomeController@founder'
]);
Route::get('/how-to-find-us', [
	'as' => 'findus',
	'uses' => 'HomeController@findus'
]);
Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'HomeController@contact'
]);
Route::get('/thank-you', [
	'as' => 'thankyou',
	'uses' => 'HomeController@thankyou'
]);
Route::get('/single-room/{slug}', [
	'as' => 'singleroom',
	'uses' => 'HomeController@singleroom'
]);

Route::post('contact', 'HomeController@addContact')->name('add_contact');

Route::get('/membership',[
	'as' => 'membership',
	'uses' => 'HomeController@membership'
]);

Route::get('/logout-web',[
	'as' => 'logout_web',
	'uses' => 'HomeController@logout_web'
]);

Route::get('/dang-ky',[
	'as' => 'registeruser',
	'uses' => 'HomeController@register_page'
]);

Route::post('/forgot_password',[
	'as' => 'forgot_web',
	'uses' => 'HomeController@forgot_web'
]);

Route::post('/update_password',[
	'as' => 'update_password',
	'uses' => 'HomeController@update_password'
]);
});

Route::group(['prefix' => 'admin'], function () {
	/*users*/
	Route::prefix("users")->group(function(){
		Route::get('/create-member-registration', [
			'as' => 'users.create_member',
			'uses' => 'Admin\VoyagerUserController@create_member'
		]);

		Route::post('/create-member-registration', [
			'as' => 'users.post_create_member',
			'uses' => 'Admin\VoyagerUserController@post_create_member'
		]);
	});
	Voyager::routes();
});

/*MANH_TU*/
Route::get('test', 'TestController@test');

Route::get('test-mail', 'TestController@testMail');

Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change_language');

Route::post('register', 'UserController@register')->name('user.register');

Route::post('confirm-registration', 'UserController@confirmRegister')->name('user.confirm_register');

Route::post('login', 'UserController@login')->name('user.login');

Route::get('membership-type', 'MembershipTypeController@list')->name('membership_type.list');

Route::post('register-membership', 'UserController@registerMembership')->name('user.register_membership');

Route::post('check-phone-email', 'UserController@checkPhoneEmail')->name('check_phone_email');

Route::prefix('/')->middleware('auth')->group(function() {
	Route::post('booking', 'HomeController@booking')->name('user.booking');
});

Route::get('membership-type', 'MembershipTypeController@list')->name('membership_type.list');

Route::get('country', 'HomeController@listCountry')->name('list_country');

Route::get('province-by-country', 'HomeController@listProvinceByCountry')->name('list_province_by_country');
/*END MANH_TU*/
/**/
Route::prefix('/admin-ajax')->middleware('auth')->group(function() {

	Route::post('booking-parties-cancel', 'Admin\BookingPartyController@cancel')->name('booking-party.cancel');

	Route::post('booking-parties-accept', 'Admin\BookingPartyController@accept')->name('booking-party.accept');

	Route::post('user-meta-cancel', 'Admin\MetaUserController@cancel')->name('user-meta.cancel');

	Route::post('user-meta-accept', 'Admin\MetaUserController@accept')->name('user-meta.accept');

	/*booking room*/

	Route::post('booking-rooms-cancel', 'Admin\BookingRoomController@cancel')->name('booking-room.cancel');

	Route::post('booking-rooms-accept', 'Admin\BookingRoomController@accept')->name('booking-room.accept');
	/*BookingWellnessBeauty*/
	Route::post('booking-spas-cancel', 'Admin\BookingWellnessBeautyController@cancel')->name('booking-spa.cancel');

	Route::post('booking-spas-accept', 'Admin\BookingWellnessBeautyController@accept')->name('booking-spa.accept');
	/*BookingEventController*/
	Route::post('booking-events-cancel', 'Admin\BookingEventController@cancel')->name('booking-event.cancel');

	Route::post('booking-events-accept', 'Admin\BookingEventController@accept')->name('booking-event.accept');
});

