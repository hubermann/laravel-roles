
@extends('layouts.backend')

@section('content')

<div class="container-fluid">

<h3>{{$user->email}}</h3>
<p>{{$user->name}}{{$user->lastname}}</p>


	@foreach ($orders as $order)
		<div class="row">

			
			<p>{{$order->id}}</p>

		</div>
	@endforeach
</div>

@endsection