@extends('layouts.adminsb')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('bookee.bookings.index') }}">
                        Bookings
                    </a>
                    / {{ $bookingId }}
                </div>

                <div class="card-body">

                             <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                           
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col">Unit Name</th>
                                    <th scope="col">Booked Date/Time:</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Round Trip</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Fee</th>
                                    <th scope="col">Booker Name</th>
                                    <th scope="col">Booker Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><span id="rental"></span><br/></td>
                                    <td> <span id="bookedDate"></span><br/></td>
                                    <td><span id="origin"></span><br/></td>
                                    <td><span id="destination"></span><br/></td>
                                    <td><span id="roundTrip"></span><br/></td>
                                    <td><span id="remarks"></span><br/></td>
                                    <td><span id="bookingFee"></span><br/></td>
                                    <td><span id="bookerName"></span><br/></td>
                                    <td><span id="bookerEmail"></span><br/></td>
                                    <td><span id="bookingStatus"></span><br/></td>
                                    <td> <div class="col-md-12">
                            <a href="{{ route('bookee.bookings.edit',
                                    $bookingId) }}"
                               class="btn btn-block btn-secondary action-edit"
                               role="button">
                                Edit
                            </a>
                            <a href="#"
                               class="btn btn-block btn-secondary action-book"
                               role="button">
                                Confirm
                            </a>
                            <a href="#"
                               class="btn btn-block btn-secondary action-cancel"
                               role="button">
                                Cancel
                            </a>
                        </div>
                        </td>
                                </tr>
                            
                            </tbody>
                             </table>
                        </div>
                    
                        </div>

                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent

<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script type="text/javascript">
    window.jQuery || document.write(
        '<script src="{{ asset('js/jquery-3.4.1.min.js') }}"><\/script>'
    );
</script>
@endsection

@section('inline_js')
@parent

$(document).ready(function () {
    var userJWToken = '{{ $jWToken }}';
    var bookingId   = '{{ $bookingId }}';

    // load reservation details
    $.ajax({
        url : "/api/bookee/bookings/" + bookingId,
        dataType : 'json',
        type: 'GET',
        beforeSend : function (xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer " + userJWToken);
        },
        error : function (jqXHR) {
            var jsonResponse = jqXHR.responseJSON;

            if (jsonResponse && jsonResponse.message) {
                alert(jsonResponse.message);
            }

            window.location.replace('/bookee/bookings')
        },
        success : function (result) {
            var booking = result.data;
            var booker  = booking.booker;

            console.log(booking);

            $('#rental').html(booking.unit_rental_id);
            $('#bookedDate').html(booking.booked_date);
            $('#origin').html(booking.origin);
            $('#destination').html(booking.destination);
            $('#roundTrip').html((booking.round_trip) ? 'Yes' : 'No');
            $('#remarks').html(booking.remarks);
            $('#bookingFee').html(booking.fee);
            $('#bookingStatus').html(booking.status);

            $('#bookerName').html(booker.name);
            $('#bookerEmail').html(booker.email);
            $('#bookerContactNo').html(booker.contact_no);
        },
    });

    $('.btn.action-book').click(function () {
        var reserve
            = confirm('Are you sure you want to confirm this booking?');

        if (reserve) {
            $.ajax({
                url: '/api/bookee/bookings/' + bookingId + '/book',
                dataType : 'json',
                type: 'POST',
                beforeSend : function (xhr) {
                    xhr.setRequestHeader("Accept", "application/json");
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.setRequestHeader("Authorization", "Bearer " + userJWToken);
                },
                error : function (jqXHR) {
                    var jsonResponse = jqXHR.responseJSON;

                    if (jsonResponse && jsonResponse.message) {
                        alert(jsonResponse.message);
                    }

                    console.log(jsonResponse);
                },
                success: function (result) {
                    alert(result.message);
                    window.location.replace('/bookee/bookings/' + bookingId);
                },
            });
        }
    });

    $('.btn.action-cancel').click(function () {
        var cancelReservation
            = confirm('Are you sure you want to cancel your reservation?');

        if (cancelReservation) {
            $.ajax({
                url: '/api/bookee/bookings/' + bookingId + '/cancel',
                dataType : 'json',
                type: 'POST',
                beforeSend : function (xhr) {
                    xhr.setRequestHeader("Accept", "application/json");
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.setRequestHeader("Authorization", "Bearer " + userJWToken);
                },
                error : function (jqXHR) {
                    var jsonResponse = jqXHR.responseJSON;

                    if (jsonResponse && jsonResponse.message) {
                        alert(jsonResponse.message);
                    }

                    console.log(jsonResponse);
                },
                success: function (result) {
                    alert(result.message);
                    window.location.replace('/bookee/bookings/' + bookingId);
                },
            });
        }
    });
});
@endsection
