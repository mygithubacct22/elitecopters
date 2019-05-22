<?php

namespace App\Http\Controllers;

class UserBookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('page-user-bookings-index');
    }

    public function create()
    {
        return view('page-user-bookings-create');
    }

    public function edit($id)
    {
        return view('page-user-bookings-edit', ['booking_id' => $id]);
    }
}
