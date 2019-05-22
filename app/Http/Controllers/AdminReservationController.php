<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminReservationController extends Controller
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
        return view('page-user-reservations-index',
            ['reservations' => Reservation::paginate()]);
    }

    public function create()
    {
        return view('page-user-reservations-create');
    }

    public function show($id)
    {
        return view('page-user-reservations-show');
    }

    public function edit($id)
    {
        return view('page-user-reservations-edit', ['reservation_id' => $id]);
    }
}
