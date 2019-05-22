<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Response;
use Carbon\Carbon;

class UserReservationController extends Controller
{
    public function index()
    {
        $currentUser = $this->authUser();

        return ['data' => $currentUser->reservations->toArray()];
    }

    public function store(CreateReservationRequest $request)
    {
        $reservation = new Reservation;
        $currentUser = $this->authUser();

        // assign fields
        $reservation->event_name = $request->event_name;
        $reservation->event_type = $request->event_type;
        $reservation->event_start
            = Carbon::createFromFormat('Y-m-d\TH:i', $request->event_start);
        $reservation->event_end
            = Carbon::createFromFormat('Y-m-d\TH:i', $request->event_end);
        $reservation->description = $request->description;

        // save
        $currentUser->reservations()->save($reservation);

        return response()->json(
            [
                'data'    => $reservation,
                'message' => 'Successfully created',
            ],
            Response::HTTP_CREATED
        );
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
