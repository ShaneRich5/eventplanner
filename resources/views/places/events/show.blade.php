@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>{{ $event->name }} at <a href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a></span>
					@auth
						<a href="{{ route('places.events.edit', ['place' => $place->id, 'event' => $event->id]) }}" class="btn btn-default">Edit</a>
					@endauth
					@guest
						<a href="{{ route('login') }}" class="btn btn-default">Login</a>
					@endguest
				</div>
				<div class="panel-body">
					@if($event->description)
						<p>{{ $event->description }}</p>
					@else
						</p>No description added</p>
					@endif
				</div>
				<review-container
					:parent="{{ $event }}"
					:user="{{ json_encode(Auth::user()) }}"
					resource="events">
				</review-container>
			</div>
		</div>
	</div>
</div>
@endsection