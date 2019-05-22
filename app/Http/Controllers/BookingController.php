<?php

namespace App\Http\Controllers;

use App\Models\UnitRental;
use JWTAuth;

class BookingController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();

        return view('page-bookings-index', [
            'bookings' => $currentUser
                            ->bookings()
                            ->with('unitRental')
                            ->paginate()
        ]);
    }

    public function show($id)
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-bookings-show', [
            'jWToken'   => $jWToken,
            'bookingId' => $id,
        ]);
    }

    public function edit($id)
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-bookings-edit', [
            'jWToken'   => $jWToken,
            'bookingId' => $id,
        ]);
    }
}
