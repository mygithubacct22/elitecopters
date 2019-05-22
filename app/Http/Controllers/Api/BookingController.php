<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\UnitRental;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $currentUser = $this->authUser();

        return [
            'data' => $currentUser
                        ->bookings()
                        ->with('unitRental')
                        ->get()
                        ->toArray()
        ];
    }

    public function show($id)
    {
        $booking = Booking::with('unitRental')->findOrFail($id);

        $this->authorize('view', $booking);

        return response()->json([
            'data'    => $booking,
            'message' => 'Record fetched',
        ]);
    }

    public function update(BookingRequest $request, $id)
    {
        $booking    = Booking::with('unitRental')->findOrFail($id);
        $unitRental = $booking->unitRental;

        $this->authorize('update', $booking);

        // TODO - validate booked_date if available

        // assign fields
        $booking->booked_date = Carbon::parse($request->booked_date);
        $booking->origin      = $request->origin;
        $booking->destination = $request->destination;
        $booking->round_trip  = $request->round_trip ?? false;
        $booking->remarks     = $request->remarks;
        $booking->fee         = $unitRental->fee;

        if ($booking->roundtrip) {
            $booking->fee += UnitRental::ROUND_TRIP_FEE;
        }

        // save
        $booking->save();

        return response()->json([
            'data'    => $booking,
            'message' => 'Successfully updated',
        ]);
    }

    public function cancel($id)
    {
        $booking     = Booking::findOrFail($id);
        $currentUser = $this->authUser();

        $this->authorize('cancel', $booking);

        // assign fields
        $booking->status      = Booking::STATUS_CANCELED;
        $booking->canceler_id = $currentUser->id;
        $booking->canceled_at = Carbon::now();

        // save
        $booking->save();

        return response()->json([
            'data'    => $booking,
            'message' => 'Successfully canceled',
        ]);
    }
}
