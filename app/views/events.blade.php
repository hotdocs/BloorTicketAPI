<!DOCTYPE html>
<html>
<head>
<title>Hot Docs Film Details</title>
<link rel="stylesheet" type="text/css" href="/stylesheets/app.css">
</head>
<body>
	
	<div class="row">
		<div class="small-12 large-12 columns">
			@foreach($films as $film)
				<p><img src="{{$film['EventImage']}}" style="width:100%;"/></p>
				<p>{{$film['Id']}}</p>
				<p>{{$film['Name']}}</p>
				<p>{{$film['ShortDescription']}}</p>
				<p>Agile Info Link : <a href="{{$film['AgileLink']}}">{{$film['AgileLink']}}</a></p>
				<p>Hot Docs Info Link : <a href="{{$film['HotDocsLink']}}">{{$film['HotDocsLink']}}</a></p>
				<hr>
			@endforeach
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

