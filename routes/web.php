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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::pattern('id','[0-9]+');

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'MainController@home');
    Route::get('about', 'MainController@about');

    Route::get('client/register', 'AuthController@register');
    Route::post('client/registerSave', 'AuthController@registerSave')->name('client/registerSave');

    Route::get('client/login', 'AuthController@login');
    Route::post('client/loginSave', 'AuthController@loginSave')->name('client/loginSave');
    Route::get('client-logout', 'AuthController@logout');

    Route::get('donations', 'MainController@donation');
    Route::get('donationSearch', 'MainController@donationSearch');
    Route::get('donatorDetails/{id}', 'MainController@donatorDetails');
    Route::get('createDonation', 'MainController@createDonation');
    Route::post('createDonationSave', 'MainController@createDonationsave');

    Route::get('contact', 'MainController@contactUs');
    Route::post('contact', 'MainController@contactUsSend');

    Route::get('articles', 'MainController@articles');
    Route::get('who-we-are', 'MainController@whoUs');
    Route::get('about-us', 'MainController@about');

    Route::group(['middleware' => 'auth:client-web'], function () {
        Route::post('toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');
    });

});


Auth::routes();
//Route::view('/home', 'home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('clients', 'ClientsController');
    Route::resource('governorate', 'Admin\GovernorateController');
    Route::resource('city', 'Admin\CitiesController');
    Route::resource('category', 'Admin\CategoriesController');
    Route::resource('post', 'Admin\PostsController');
    Route::resource('donation', 'Admin\DonationController');
    Route::resource('contacts', 'Admin\ContactsController');
    Route::resource('settings', 'Admin\SettingsController');

    Route::resource('users', 'Admin\UserController');
    Route::resource('role', 'Admin\RoleController');

    Route::get('change-password', 'Admin\UserController@changePassword');
    Route::post('change-password', 'Admin\UserController@changePasswordSave');

    Route::get('client/{id}/active', 'ClientsController@activate');
    Route::get('client/{id}/deActive', 'ClientsController@deActive');

});


//,'prefix'=>'Admin'
