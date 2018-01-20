
@extends('layouts.backend')

@section('content')

<style>
	.card{border: 1px solid #ccc; margin-bottom: .5em;}
	.card-header{padding: .8em; background: #f2f2f2; border-bottom:1px solid #ccc; font-weight: 400;}
	.card-body{padding: .8em}
</style>

<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			
			<div class="row">
				<h3>{{$user->email}}</h3>
				<p>{{$user->name}}{{$user->lastname}} | Registrado: {{ $user->created_at->diffForHumans() }}</p>
				<hr>
			</div>

			<div class="row">
				<h5>Historial de ordenes</h5>
				@unless($orders->count())
					<p>No items.</p>
				@else

					@foreach($orders as $order)

					<div class="card">
						<div class="card-header">
							Order ID: {{ $order->id}}  - 

							<span class="text"> Status: 
							@if ( $order->payment_status == 0)
							Pending
							@elseif ( $order->payment_status == 1)
							Successfully
							@elseif ( $order->payment_status == 2)
							Declined
							@endif</span>

						</div>

						<div class="card-body">
							<p>Date: <span class="font-italic"> {{ $order->created_at->diffForHumans() }} </span></p>

						@foreach($order->unserialize_detail($order->id) as $item)
							<h5 class="card-title">{{ $item['title'] }}</h5>
							<p class="card-text"> {{$item['quantity']}} x  ${{$item['unit_price']}}  </p>
							<p class="card-text"> Total: ${{ $order->amount }}  </p>
						@endforeach	

						</div>
					</div>
					<br>

					@endforeach						
				@endunless
			</div>  <!-- end row -->



		</div>
	</div>
</div>


@endsection