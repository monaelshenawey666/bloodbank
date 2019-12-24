<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//  api/v1/governrates
Route::group(['prefix'=>'v1','namespace'=>'Api'],function()
{
    Route::get('governrates','MainController@governrates');
    Route::get('cities','MainController@cities');
    Route::get('category','MainController@category');
    Route::get('blood_types','MainController@bloodTypes');
    Route::get('settings','MainController@settings');
    Route::post('contacts','MainController@contact');

    Route::post('resetpassword','AuthController@resetpassword');
    Route::post('newpassword','AuthController@newpassword');
    Route::post('register','AuthController@Register');
    Route::post('login','AuthController@Login');

    Route::group(['middleware'=>'auth:api'],function()
    {
        Route::post('register-token', 'AuthController@registerToken');
        Route::get('posts','MainController@posts');
        Route::get('favouritePosts','MainController@favouritePosts');
        Route::post('toggleFavourite','MainController@toggleFavourite');
        Route::post('donationRequest','MainController@donationRequestCreate');
        Route::post('profile','AuthController@profile');
        Route::post('notificationSettings','MainController@notificationSettings');
        Route::get('listNotifications','MainController@listNotifications');
        Route::get('notifications','MainController@notifications');
    });

});

