<?php

namespace App\Http\Controllers\Bookee;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use JWTAuth;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookee.page-bookings-index',
            ['bookings' => Booking::paginate()]);
    }

    public function show($id)
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('bookee.page-bookings-show', [
            'jWToken'   => $jWToken,
            'bookingId' => $id,
        ]);
    }

    public function edit($id)
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('bookee.page-bookings-edit', [
            'jWToken'   => $jWToken,
            'bookingId' => $id,
        ]);
    }
}
