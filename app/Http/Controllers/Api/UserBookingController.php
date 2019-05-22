<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Response;

class UserBookingController extends Controller
{
    public function index()
    {
        $user = $this->authUser();

        return ['data' => $user->bookings->toArray()];
    }

    public function store(BookingRequest $request)
    {
        $currentUser = $this->authUser();
        $booking     = new Booking;

        // assign fields
        $booking->reserved_date = $request->reserved_date;

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

    public function show($id)
    {
        $currentUser = $this->authUser();
        $booking     = Booking::findOrFail($id);

        // must not be able to show if not own booking
        if ($currentUser->id != $booking->user_id) {
            return response()->json(
                ['message' => 'Permission denied'],
                Response::HTTP_FORBIDDEN
            );
        }

        return response()->json([
            'data'    => $booking,
            'message' => 'Record fetched',
        ]);
    }

    public function update(BookingRequest $request, $id)
    {
        $currentUser = $this->authUser();
        $booking     = Booking::findOrFail($id);

        // must not be able to edit if not own booking
        if ($currentUser->id != $booking->user_id) {
            return response()->json(
                ['message' => 'Permission denied'],
                Response::HTTP_FORBIDDEN
            );
        }

        // must not be able to update if not pending or already approved

        // validate reserved_date if available 

        $booking->save();

        return response()->json([
            'data'    => $booking,
            'message' => 'Successfully updated',
        ]);
    }

    // public function destroy($id)
    // {
    //     $booking = Booking::findOrFail($id);
    //     $booking->delete();

    //     return ['message' => 'Successfully deleted'];
    // }
}
