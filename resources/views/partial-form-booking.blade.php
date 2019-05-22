@php
use App\Models\UnitRental;
@endphp
<div class="row">
    <div class="col-md-6">
        <div class="form-group booked_date">
            <label for="bookedDateInput">
                Book Date/Time
            </label>

            <div class="input-group date" id="bookedDate" data-target-input="nearest">
                <input type="text"
                       id="bookedDateInput"
                       class="form-control datetimepicker-input"
                       data-target="#bookedDate"/>
                <div class="input-group-append" data-target="#bookedDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>

            <div class="feedback">
                <small id="bookedDateHelp"
                       class="form-text text-muted">
                    Date and time of booking.
                </small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group round_trip">
            <div class="form-check">
                <input type="checkbox"
                       class="form-check-input"
                       id="roundTripInput"
                       name="round_trip"
                       value=1>
                <label class="form-check-label" for="roundTripInput">
                    Round Trip
                </label>


                <small id="roundTripHelp"
                        class="form-text text-muted">
                    Leave unchecked for one-way trip.
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label for="estimatedCost">
            Estimated Cost
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text"
                   class="form-control"
                   id="estimatedCost"
                   readonly
                   disabled
                   aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group origin">
            <label for="originInput">Origin</label>
            <select class="form-control"
                    id="originInput"
                    name="origin">
                <option value="">--Select Origin--</option>
                @foreach (UnitRental::HELI_LOCATIONS as $value => $label)
                <option value="{{$value }}">{{ $label }}</option>
                @endforeach
            </select>
            <div class="feedback">
                <small id="originHelp"
                    class="form-text text-muted">
                    Pick up location.
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group destination">
            <label for="destinationInput">Destination</label>
            <select class="form-control"
                    id="destinationInput"
                    name="destination">
                <option value="">--Select destination--</option>
                @foreach (UnitRental::HELI_LOCATIONS as $value => $label)
                <option value="{{$value }}">{{ $label }}</option>
                @endforeach
            </select>
            <div class="feedback">
                <small id="destinationHelp"
                    class="form-text text-muted">
                    Drop off location.
                </small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group remarks">
            <label for="remarksInput">
                Remarks
            </label>

            <textarea class="form-control"
                      id="remarksInput"
                      name="remarks"
                      placeholder="Remarks"></textarea>

            <div class="feedback">
                <small id="remarksHelp"
                       class="form-text text-muted">
                    Remarks for your trip.
                </small>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="rentalFee" value="{{ $rental->fee ?? 0 }}" />

@section('styles')
@parent

<link href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}"
      rel="stylesheet"
      type="text/css">
@endsection

@section('scripts')
@parent

<script type="text/javascript"
        src="{{ asset('js/moment-with-locales.min.js') }}">
</script>

<script type="text/javascript"
        src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}">
</script>
@endsection

@section('inline_js')
var roundTripFee = {{ UnitRental::ROUND_TRIP_FEE }};

@parent
@endsection

@section('inlined_jq')
@parent

function setEstimatedCost() {
    var fee = parseInt($('#rentalFee').val());

    if ($('#roundTripInput').prop('checked')) {
        fee += roundTripFee;
    }

    $('#estimatedCost').val(fee);
}

setEstimatedCost();

$('#roundTripInput').click(function () {
    setEstimatedCost();
});
@endsection
