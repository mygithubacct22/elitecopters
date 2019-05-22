@extends('layouts.adminsb')

@section('content')
<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Premium Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">PREMIUM</h5>
            <h6 class="card-price text-center">$3,000<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>5x usage of preferred unit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Single Pilot Only</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Local Destinations Only</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>One Way Only</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>1-hours Time Limit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Up to 30-mins waiting time</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Snacks and Drinks</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dependents Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Side Sightseeing near Destination</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Time Limit</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Booking and Status Reports</li>
            </ul>
           
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">PLUS</h5>
            <h6 class="card-price text-center">$10,000<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span>10x usage of preferred unit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dual Pilot</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Local Destinations Only</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Two-Way</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Up to 2-hr waiting time</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>5-hours Time Limit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Snacks and Drinks</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dependents Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Sightseeing near the destination</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Time Limit</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Booking and Status Reports</li>
            </ul>
          
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">PRO</h5>
            <h6 class="card-price text-center">$30,000<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited usage of preferred unit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dual Pilot</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Local and International Destinations</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Two-Way</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Waiting Time</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Snacks and Drinks</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dependents Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Third Party Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Sightseeing near the destination</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Time Limit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Booking and Status Reports</li>
              
            </ul>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection