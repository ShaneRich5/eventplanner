@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Places
					@auth
						<a href="{{ route('places.create') }}" class="btn btn-default">Create</a>
					@endauth
					@guest
						<a href="{{ route('login') }}" class="btn btn-default">Login</a>
					@endguest
				</div>
				<div class="panel-body">
					<ul>
					@forelse($places as $place)
						<li><a href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a></li>
					@empty
						<p>No places available</p>
					@endforelse
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
