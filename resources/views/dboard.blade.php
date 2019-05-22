@extends('layouts.adminsb')

@section('content')
<header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="display-3 text-white">ELITECOPTERS</h1>
        <p class="lead mb-0">Set your journey to autopilot.</p>

      </div>
    </div>
  </div>
</header>

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <hr>
        <p>ELITECOPTERS strives to provide the most efficient helicopter solutions to its customers who like an elite experience and safely carry passengers in demanding environments.It offers the most modern and comprehensive helicopter family in the world, giving customers the greatest choice of unique, customisable and spacious cabins, allowing them to select the comfort they want in the size they need – offering them a unique flying experience. </p>
        <hr>
        <p class="mb-0">
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="my-8 text-center"><strong>ELITE HELICOPTERS PORTFOLIO</strong></h1>
<hr>

<!-- Project One -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('images/EHX-A200.jpg') }}" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>EHX-A200</h3>
    <p>The EHX-A200 is an intermediate single-engine helicopter tailored for passenger transportation and has a spacious cabin for one pilot and up to two passengers. The EHX-A200’s main and tail rotor systems incorporate proven Airbus technologies for performance, ruggedness, reliability and safety.</p>
    <p><strong>Cost: $500 / way</strong></p>
    
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Project Two -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('images/EHX-B200.jpg') }}" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>EHX-B200</h3>
    <p>From major tourist destinations to the busy airspace over cities, the single-engine EHX-B200 is in widespread use with sightseeing services.This user-friendly helicopter is pleasant and easy for pilots to fly. The Vehicle and Engine Multifunction Display (VEMD), integrated in the instrument panel, reduces the pilot’s workload considerably, thus enhancing flight safety.  </p>
    <p><strong>Cost: $500 / way</strong></p>
   
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Project Three -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('images/EHX-CX30.jpg') }}" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>EHX-CX30</h3>
    <p>EHX-CX30 is an intermediate single-engine helicopter tailored for sightseeing and VIP duties. It has an Active Vibration Control System and advanced environmental control; improved air conditioning; a cabin interior structure redesign with a full flat floor.</p>
    <p><strong>Cost: $700 / way</strong></p>
   
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Project Four -->
<div class="row">

  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('images/EHX-ZD50.jpg') }}" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>EHX-ZD50</h3>
    <p>A safe, silent and comfortable ride is expected to this single engine unit.Depending on the configuration, it can carry up to two pilots.With a noise signature 7 dB below requirements, it is quieter than the most restrictive limits defined by the Grand Canyon National Park in the United States – a recognised benchmark for eco-friendly tourism operations.</p>
    <p><strong>Cost: $900 / way</strong></p>
    
  </div>
</div>
<!-- /.row -->
<hr>
<!-- Project Five -->
<div class="row">

  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('images/EHX-xG90.jpg') }}" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>EHX-xG90</h3>
    <p>The EHX-xG90 is fully equipped with a VFR day-and-night navigation system in a standard “ready to fly” package, associated with a GPS map display.</p>
    <p><strong>Cost: $1,000 / way</strong></p>
   
  </div>
</div>
<!-- /.row -->

<hr>
</div>
@endsection