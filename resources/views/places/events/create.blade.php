@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">New Event at {{ $place->name}}</div>
				<div class="panel-body">
					<event-form :place-id="{{ $place->id }}"></event-form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection