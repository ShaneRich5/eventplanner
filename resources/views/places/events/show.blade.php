@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $event->name }}
					@auth
						<a href="{{ route('places.events.edit', ['place' => $place->id, 'event' => $event->id]) }}" class="btn btn-default">Edit</a>
					@endauth
					@guest
						<a href="{{ route('login') }}" class="btn btn-default">Login</a>
					@endguest
				</div>
				<div class="panel-body">
					<p>{{ $event->description }}</p>
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