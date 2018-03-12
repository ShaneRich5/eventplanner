@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $place->name }}
					@auth
						<a href="{{ route('places.edit', $place->id) }}" class="btn btn-default">Edit</a>
					@endauth
					@guest
						<a href="{{ route('login') }}" class="btn btn-default">Login</a>
					@endguest
				</div>
				<div class="panel-body">
					@if($place->description)
						<p>{{ $place->description }}</p>
					@else
						</p>No description added</p>
					@endif
				</div>
				<div class="panel-heading">
					<b>Events</b>
					@auth
						<a href="{{ route('places.events.create', $place->id) }}" class="btn btn-default">Add</a>
					@endauth
					@guest
						<a href="">Login to create event</a>
					@endguest
				</div>
				<div class="panel-body">
					@if($place->events->count() > 0)
						<event-list place-id="{{ $place->id }}" :events="{{ $place->events }}"></event-list>
					@else
						<p>No events added yet</p>
					@endif
				</div>
				<review-container
					:parent="{{ $place }}"
					:user="{{ json_encode(Auth::user()) }}"
					resource="places">
				</review-container>
			</div>
		</div>
	</div>
</div>
@endsection