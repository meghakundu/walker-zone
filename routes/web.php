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


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    // Route::get('/', function () {
    //     return view('home.index');
    // });
    Route::get('/', 'UserController@index');
       
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/start-route', 'UserController@startRoute');
        Route::put('/finish-route', 'UserController@finishRoute');
        Route::put('/update-route', 'UserController@updateRoute');
        Route::get('/add-promotions', 'UserController@addPromotions')->name('reviews.list');
        Route::post('/store-reviews', 'UserController@storePromotions');
        Route::post('/like-post/{id}','UserController@likePost')->name('like.post');
        Route::get('/referral_link/{name}/{ref_code}','UserController@routeDetails');
        Route::get('razorpay-payment','RazorPayController@index');
        Route::post('razorpay-payment','RazorPayController@store')->name('razorpay.payment.store');
        Route::get('/your-chosen-routemap', 'UserController@geoMap');  
    });
});
