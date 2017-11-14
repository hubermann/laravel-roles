@extends('layouts.backend')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			

			@foreach ($users as $user)
			<p>This is user {{ $user->email }} {{ $user->name }} {{ $user->role}}

			</p>
			@endforeach

		</div>
	</div>
</div>

@endsection