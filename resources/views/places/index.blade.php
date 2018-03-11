@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
							<div class="panel-heading">Places <a href="{{ route('places.create') }}" class="btn btn-default">Create</a></div>

                <div class="panel-body">
									@forelse($places as $place)
										{{ $place->id }}
									@empty
										<p>No places available</p>
									@endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
