<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Response;

class AdminReservationController extends Controller
{
    public function index()
    {
        return ['data' => Reservation::all()->toArray()];
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        $this->authorize('view', $reservation);

        return response()->json([
            'data'    => $reservation,
            'message' => 'Record fetched',
        ]);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $this->authorize('update', $reservation);

        // validate reserved_date if available

        // assign fields

        // save
        $reservation->save();

        return response()->json([
            'data'    => $reservation,
            'message' => 'Successfully updated',
        ]);
    }

    public function reserve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $currentUser = $this->authUser();

        $this->authorize('reserve', $reservation);

        // assign fields
        $reservation->status      = Reservation::STATUS_RESERVED;
        $reservation->reservee_id = $currentUser->id;

        // save
        $reservation->save();

        return response()->json([
            'data'    => $reservation,
            'message' => 'Successfully reserved',
        ]);
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $currentUser = $this->authUser();

        $this->authorize('cancel', $reservation);

        // assign fields
        $reservation->status      = Reservation::STATUS_CANCELED;
        $reservation->canceler_id = $currentUser->id;

        // save
        $reservation->save();

        return response()->json([
            'data'    => $reservation,
            'message' => 'Successfully canceled',
        ]);
    }
}
