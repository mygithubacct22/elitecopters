@extends('layouts.adminsb')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('bookings.index') }}">
                        Bookings
                    </a>
                    /
                    <a href="{{ route('bookings.show', $bookingId) }}">
                        {{ $bookingId }}
                    </a>
                    / Edit
                </div>

                <div class="card-body">

                    @include('partial-form-booking')
                    
                    <div class="row">
                        <div class="col-md-12">

                            <div class="float-right">
                                <a href="{{ route('bookings.show',
                                        $bookingId) }}"
                                    class="btn btn-danger"
                                    role="button">
                                    Cancel
                                </a>
                                &nbsp;
                                <button type="submit"
                                        class="btn btn-primary action-save">
                                    Save
                                </button>
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
$(document).ready(function () {
    var userJWToken    = '{{ $jWToken }}';
    var bookingId = '{{ $bookingId }}';

    // load booking details
    $.ajax({
        url : "/api/bookings/" + bookingId,
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

            window.location.replace('/bookings')
        },
        success : function (result) {
            var booking = result.data;
            console.log(booking);
            $('#bookedDateInput').val(booking.booked_date);
            $('#originInput').val(booking.origin);
            $('#destinationInput').val(booking.destination);
            $('#roundTripInput').val(booking.round_trip);
            $('#remarksInput').val(booking.remarks);

            var rentalFee = booking.fee;
            if (booking.round_trip) {
                $('#roundTripInput').prop('checked', booking.round_trip);
                rentalFee -= roundTripFee;
            }
            
            $('#rentalFee').val(rentalFee);
            setEstimatedCost();
        },
    });

    $('.btn.action-save').click(function (event) {
        event.preventDefault();

        var formData = {
            'booked_date' : $('#bookedDateInput').val(),
            'round_trip'  : $('#roundTripInput').prop('checked'),
            'origin'      : $('#originInput option:selected').val(),
            'destination' : $('#destinationInput option:selected').val(),
            'remarks'     : $('#remarksInput').val(),
        };;

        $.ajax({
            url : '/api/bookings/' + bookingId,
            dataType : 'json',
            data : JSON.stringify(formData),
            type: 'PATCH',
            beforeSend : function (xhr) {
                xhr.setRequestHeader("Accept", "application/json");
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("Authorization", "Bearer " + userJWToken);
            },
            error : function (jqXHR) {
                var jsonResponse = jqXHR.responseJSON;

                if (jsonResponse) {
                    console.log(jsonResponse);

                    if (jsonResponse.message) {
                        alert(jsonResponse.message);
                    }

                    $('.form-group .form-control')
                        .removeClass('is-invalid');
                    $('.form-group .feedback')
                        .removeClass('invalid-feedback')
                        .html('');

                    if (jsonResponse.errors) {
                        for (var error in jsonResponse.errors) {
                            $('.form-group.' + error + ' .form-control')
                                .addClass('is-invalid');
                            $('.form-group.' + error + ' .feedback')
                                .addClass('invalid-feedback')
                                .html(jsonResponse.errors[error][0]);
                        }
                    }
                }
            },
            success : function (result) {
                console.log(result);
                alert(result.message);

                var booking   = result.data;
                var bookingId = booking._id;

                window.location.replace('/bookings/' + bookingId);
            },
        });
    });

    @yield('inlined_jq')
});
@endsection
