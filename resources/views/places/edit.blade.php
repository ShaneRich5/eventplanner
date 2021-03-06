@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit {{ $place->name }}
					<a href="{{ route('places.show', $place->id) }}" class="btn btn-default">Cancel</a>
				</div>
				<div class="panel-body">
					<place-form :place="{{ $place }}"></place-form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection