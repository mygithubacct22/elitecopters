<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Reservation;

class UserReservationController extends Controller
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
        $currentUser = auth()->user();

        return view('page-user-reservations-index',
            ['reservations' => $currentUser->reservations()->paginate()]);
    }

    public function create()
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-user-reservations-create', [
            'jWToken'    => $jWToken,
            'eventTypes' => Reservation::EVENT_TYPES,
        ]);
    }

    public function show($id)
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-user-reservations-show', [
            'jWToken'       => $jWToken,
            'reservationId' => $id,
        ]);
    }

    public function edit($id)
    {
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-user-reservations-edit', [
            'jWToken'       => $jWToken,
            'reservationId' => $id,
            'eventTypes'    => Reservation::EVENT_TYPES,
        ]);
    }
}
