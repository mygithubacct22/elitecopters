@extends('layouts.adminsb')

@php
use App\Models\UnitRental;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header h3">
                    Your appointment is our priority. Book Now!
                </div>

                <div class="card-body">
                    
                    <a href="{{ route('rentals.index') }}"
                       class="btn btn-primary float-right"
                       role="button">
                        Book a Trip
                    </a>

                    <br/>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <!-- <caption>List of bookings</caption> -->
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col">Unit Name</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Booked Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                <tr>
                                    <th scope="row">
                                        {{ ($booking->unit_rental)
                                            ? $booking->unit_rental->name
                                            : $booking->unit_rental_id }}
                                    </th>
                                    <td>{{ UnitRental::HELI_LOCATIONS[$booking->origin] }}</td>
                                    <td>{{ UnitRental::HELI_LOCATIONS[$booking->destination] }}</td>
                                    <td>{{ $booking->booked_date }}</td>
                                    <td>{{ $booking->status_label }}</td>
                                    <td>
                                        <a href="{{ route('bookings.show',
                                                $booking->id) }}"
                                           class="btn btn-secondary"
                                           role="button">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan=100 class="text-center">
                                        No records found
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
