@extends('layouts.backend')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			

			@foreach ($notes as $note)
			<p>This is note: {{ $note->title }} {{ $note->description }}

			</p>
			@endforeach

		</div>
	</div>
</div>

@endsection