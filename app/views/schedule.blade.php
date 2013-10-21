<!DOCTYPE html>
<html>
<head>
<title>Hot Docs Schedule</title>
</head>
<body>

	@foreach($screenings as $screening) 
		<p>{{$screening['Id']}}</p>
		<p>{{$screening['Name']}}</p>
		<p>{{$screening['Time']}}</p>
		<p><a href="{{$screening['Url']}}">{{$screening['Url']}}</a></p>
		<hr>
	@endforeach

	<p><a href="#" class="radius button">Add</a></p>

</body>
</html>
