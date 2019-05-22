@extends('layouts.adminsb')

@section('inline_styles')
@parent

img.rental-image {
    width: 100%;
}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Rentals
                </div>
                <div class="card-body">
                    @foreach ($rentals as $rental)
                    <div class="card">
                        <div class="card-header">
                            {{ $rental->model_no }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset("images/{$rental->image}") }}"
                                        class="rental-image"/>
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $rental->name }}</h3>
                                    <p>{{ $rental->description }}</p>
                                    <div class="float-left">
                                        GPS: {{ $rental->gps_no }}<br/>
                                        Pilot: {{ $rental->pilot }}<br/>
                                        Contact No: {{ $rental->contact_no }}<br/>
                                        Fee: $ {{ $rental->fee }}<br/><br/>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{ route('rentals.book',
                                                $rental->id) }}"
                                        class="btn btn-secondary"
                                        role="button">
                                            Book
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
