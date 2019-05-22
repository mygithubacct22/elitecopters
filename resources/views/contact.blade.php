
@extends('layouts.adminsb')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container contact">
	<div class="row">
		<div class="col-md-4" id ="message">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Drop a Message!</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>
		<div class="col-md-8">
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">First Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Last Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Comment:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-contact">
	<div class="box">
		<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
		<div class='details'><h3>BGC,Philippines</h3></div>
	</div>
	
	<div class="box">
		<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
		<div class='details'><h3>+632 8745265</h3></div>
	</div>
	
	<div class="box">
		<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
		<div class='details'><h3>admin@elitecopters.com</h3></div>
	</div>
</div>


</div>



@endsection