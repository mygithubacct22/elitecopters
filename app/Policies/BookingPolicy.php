<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the booking.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Booking  $booking
     * @return mixed
     */
    public function view(User $user, Booking $booking)
    {
        $allow = false;

        switch ($user->role) {
            case User::ROLE_BOOKER:
                $allow = $user->id == $booking->booker_id;
                break;
            case User::ROLE_BOOKEE:
                $allow = true;
                break;
        }

        return $allow;
    }

    /**
     * Determine whether the user can create bookings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the booking.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Booking  $booking
     * @return mixed
     */
    public function update(User $user, Booking $booking)
    {
        $allow = false;

        switch ($user->role) {
            case User::ROLE_BOOKER:
                $allow = ($user->id == $booking->booker_id)
                    && (Booking::STATUS_PENDING == $booking->status);
                break;
            case User::ROLE_BOOKEE:
                $allow = true;
                break;
        }

        return $allow;
    }

    /**
     * Determine whether the user can delete the booking.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Booking  $booking
     * @return mixed
     */
    public function delete(User $user, Booking $booking)
    {
        //
    }

    /**
     * Determine whether the user can restore the booking.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Booking  $booking
     * @return mixed
     */
    public function restore(User $user, Booking $booking)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the booking.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Booking  $booking
     * @return mixed
     */
    public function forceDelete(User $user, Booking $booking)
    {
        //
    }

    public function book(User $user, Booking $booking)
    {
        $allow = false;

        if (User::ROLE_BOOKEE == $user->role
            && Booking::STATUS_BOOKED != $booking->status) {
            $allow = true;
        }

        return $allow;
    }

    public function cancel(User $user, Booking $booking)
    {
        $allow = false;

        if (Booking::STATUS_CANCELED != $booking->status) {
            switch ($user->role) {
                case User::ROLE_BOOKER:
                    $allow = ($user->id == $booking->booker_id)
                                && (Booking::STATUS_BOOKED
                                    != $booking->status);
                    break;
                case User::ROLE_BOOKEE:
                    $allow = true;
                    break;
            }
        }

        return $allow;
    }
}
