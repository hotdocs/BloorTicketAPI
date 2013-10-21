<!DOCTYPE html>
<html>
<head>
<title>Hot Docs Film Details</title>
<link rel="stylesheet" type="text/css" href="/stylesheets/app.css">
</head>
<body>
	<br>
	<div class="row">
		<div class="small-12 large-12 columns">
			{{ Form::open(array('url' => '/members/add')) }}
				<div class="small-12 large-6 columns">
					{{ Form::label('firstname', 'First Name') }}
					{{ Form::text('firstname') }}
				</div>
				<div class="small-12 large-6 columns">
					{{ Form::label('lastname', 'Last Name') }}
					{{ Form::text('lastname') }}
				</div>
				<div class="small-12 large-6 columns">
					{{ Form::label('email', 'Email') }}
					{{ Form::email('email') }}
				</div>
				<div class="small-12 large-6 columns">
					{{ Form::label('phone', 'Phone Number') }}
					{{ Form::email('phone') }}
					{{-- The phone number of the customer (Must be formatted 123-456-1234) --}}
				</div>
				<div class="small-12 large-12 columns">
					{{ Form::label('address1', 'Address 1') }}
					{{ Form::text('address1') }}
				</div>
				<div class="small-12 large-12 columns">
					{{ Form::label('address2', 'Address 2') }}
					{{ Form::text('address2') }}
				</div>
				<div class="small-12 large-4 columns">
					{{ Form::label('city', 'City') }}
					{{ Form::email('city') }}
				</div>
				<div class="small-12 large-4 columns">
					{{ Form::label('state', 'State') }}
					{{-- The two digit abbreviation for the state/province for the address (AL, TN, BC, etc.) --}}
					{{ Form::text('state') }}
				</div>
				<div class="small-12 large-4 columns">
					{{ Form::label('zippostal', 'Zip/Postal') }}
					{{ Form::text('zippostal') }}
				</div>
				<div class="small-12 large-12 columns">
					{{ Form::label('country', 'Country') }}
					{{ Form::text('country') }}
				</div>

				<div class="small-12 large-6 columns">
					{{ Form::label('username', 'Username') }}
					{{ Form::text('username') }}
				</div>
				<div class="small-12 large-6 columns">
					{{ Form::label('password', 'Password') }}
					{{ Form::text('password') }}
				</div>
				

				<div class="small-12 large-12 columns">
					{{ Form::hidden('questionid', 'questionid_from_server'); }}
					{{ Form::label('password', 'TEXT OF QUESTION FROM SERVER') }}
					{{ Form::text('password') }}
				</div>

				{{ Form::submit('Register', array('class' => 'radius button')) }} 
			{{ Form::close() }}
		</div>
	</div>
	
	<script src="/javascripts/vendor/jquery.js" type="text/javascript" charset="utf-8"></script>

	<script src="/javascripts/foundation/foundation.js"></script>

	<script src="/javascripts/foundation/foundation.abide.js"></script>

	<script src="/javascripts/foundation/foundation.alerts.js"></script>

	<script src="/javascripts/foundation/foundation.clearing.js"></script>

	<script src="/javascripts/foundation/foundation.cookie.js"></script>

	<script src="/javascripts/foundation/foundation.dropdown.js"></script>

	<script src="/javascripts/foundation/foundation.forms.js"></script>

	<script src="/javascripts/foundation/foundation.interchange.js"></script>

	<script src="/javascripts/foundation/foundation.joyride.js"></script>

	<script src="/javascripts/foundation/foundation.magellan.js"></script>

	<script src="/javascripts/foundation/foundation.orbit.js"></script>

	<script src="/javascripts/foundation/foundation.placeholder.js"></script>

	<script src="/javascripts/foundation/foundation.reveal.js"></script>

	<script src="/javascripts/foundation/foundation.section.js"></script>

	<script src="/javascripts/foundation/foundation.tooltips.js"></script>

	<script src="/javascripts/foundation/foundation.topbar.js"></script>


	<script>
		$(document).foundation();
	</script>
	<script>
		$(function() {

		});
	</script>
</body>
</html>

