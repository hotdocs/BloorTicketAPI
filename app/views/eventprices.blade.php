
<h2>Select Ticket Quantity</h2>

{{ Form::open(array('url' => '/orders/buytickets')) }}
	<div class="row">
		<div class="small-2 columns">
			{{Form::select('numberoftickets', $CountPerOrder)}}
		</div>
		<div class="small-10 columns">
			{{$TicketType}} - {{$BasePrice}}
		</div>
	</div>
	{{ Form::submit('Add To Cart', array('class' => 'radius button')) }} {{ Form::button('Cancel', array('class' => '')) }}
	<p>Note: the cancel button isn't functional.'</p>
{{ Form::close() }}
