@extends('_layout')

@section('content')
<h1>Events</h1>

<div>

// lees alle events uit $events
@foreach($events as $event)

<div class="eventbox" style="background-image:url('{{ $event['small_banner_url'] }}')">
	<div class="eventbox-inner">
		<h2>{{ $event['title'] }}</h2>
	</div> 
</div>

@endforeach

</div>

@endsection

