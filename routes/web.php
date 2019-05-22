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

Route::get('/dboard', function () {
    return view('dboard');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('registerpage');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['reset' => false]);


Route::group(
    ['middleware' => 'auth'],
    function ($router)
    {
        Route::resource(
            'bookee/bookings',
            'Bookee\BookingController',
            [
                'only'       => ['index', 'show', 'edit'],
                'middleware' => 'bookee',
                'as'         => 'bookee',
            ]
        );

        Route::get('rentals/{rental}/book', [
            'as'   => 'rentals.book',
            'uses' => 'UnitRentalController@book',
        ]);

        Route::resource('bookings',
                        'BookingController',
                        ['only' => ['index', 'show', 'edit']]);
    }
);

Route::resource('rentals',
                'UnitRentalController',
                ['only' => ['index', 'show']]);
