<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(
    [
        'prefix' => 'auth',
        'as' => 'api.auth.',
    ],
    function ($router)
    {
        Route::post('login', [
            'as'   => 'login',
            'uses' => 'Api\Auth\AuthController@login'
        ]);

        Route::post('logout', [
            'as'   => 'logout',
            'uses' => 'Api\Auth\AuthController@logout',
        ]);

        Route::post('refresh', [
            'as'   => 'refresh',
            'uses' => 'Api\Auth\AuthController@refresh',
        ]);

        Route::post('me', [
            'as'   => 'me',
            'uses' => 'Api\Auth\AuthController@me',
        ]);

        Route::post('payload', [
            'as'   => 'payload',
            'uses' => 'Api\Auth\AuthController@payload',
        ]);
    }
);

Route::group(
    [
        'middleware' => 'jwt',
        'prefix' => 'bookee',
        'as' => 'api.bookee.',
    ],
    function ($router)
    {
        Route::resource('bookings',
                        'Api\Bookee\BookingController',
                        ['except' => ['create', 'store', 'edit', 'destroy']]);

        Route::post('bookings/{booking}/book', [
            'as'   => 'bookings.reserve',
            'uses' => 'Api\Bookee\BookingController@book',
        ]);

        Route::post('bookings/{booking}/cancel', [
            'as'   => 'bookings.cancel',
            'uses' => 'Api\Bookee\BookingController@cancel',
        ]);
    }
);

Route::group(
    [
        'middleware' => 'jwt',
        'as' => 'api.',
    ],
    function ($router)
    {
        Route::post('rentals/{rental}/book', [
            'as'   => 'rentals.book',
            'uses' => 'Api\UnitRentalController@book',
        ]);

        Route::resource('bookings',
                        'Api\BookingController',
                        ['only' => ['index', 'show', 'update']]);

        Route::post('bookings/{booking}/cancel', [
            'as'   => 'bookings.cancel',
            'uses' => 'Api\BookingController@cancel',
        ]);
    }
);
