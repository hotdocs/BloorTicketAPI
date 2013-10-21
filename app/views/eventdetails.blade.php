<!DOCTYPE html>
<html>
<head>
<title>Hot Docs Film Details</title>
<link rel="stylesheet" type="text/css" href="/stylesheets/app.css">
</head>
<body>
	
	<div class="row">
		<div class="small-12 large-8 columns">
			<p><img src="{{$films['EventImage']}}" style="width:100%;"/></p>
			<h1>{{$films['Name']}}</h1>
			<div>{{$films['EventDescription']}}</div>
			<p>{{$films['Id']}}</p>
		</div>
		<div class="small-12 large-4 columns">
			<h2>Upcoming Screenings</h2>

			@foreach($films['CurrentShowings']->Showing as $showing)

				<p>{{$showing->ID}}</p>
				<p>{{$showing->StartDate}}</p>
				{{--
				<p>{{$showing->Duration}}</p>
				<p>{{$showing->SalesState}}</p>
				<p>{{$showing->Venue}}</p>
				--}}
				<p><a href="/films/{{$showing->ID}}/price" data-reveal-id="buytickets-modal" data-reveal-ajax="true" class="radius button">Buy Tickets</a></p>
				
				<hr>
			@endforeach
		</div>
	</div>
	
	<div id="buytickets-modal" class="reveal-modal medium"></div>
	
	
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
	/*
		$(function() {

		});
	*/
	</script>
</body>
</html>
