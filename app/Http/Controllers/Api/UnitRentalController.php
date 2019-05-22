<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\UnitRental;
use Illuminate\Http\Response;
use Carbon\Carbon;

class UnitRentalController extends Controller
{
    public function book(BookingRequest $request, $unitRentalId)
    {
        $unitRental  = UnitRental::findOrFail($unitRentalId);
        $booking     = new Booking;
        $currentUser = $this->authUser();

        // TODO - validate booked_date if available

        // assign fields
        $booking->unit_rental_id = $unitRental->id;
        $booking->booked_date    = Carbon::parse($request->booked_date);
        $booking->origin         = $request->origin;
        $booking->destination    = $request->destination;
        $booking->round_trip     = $request->round_trip ?? false;
        $booking->remarks        = $request->remarks;
        $booking->fee            = $unitRental->fee;

        if ($booking->round_trip) {
            $booking->fee += UnitRental::ROUND_TRIP_FEE;
        }

        // save
        $currentUser->bookings()->save($booking);

        return response()->json(
            [
                'data'    => $booking,
                'message' => 'Successfully created',
            ],
            Response::HTTP_CREATED
        );
    }
}
