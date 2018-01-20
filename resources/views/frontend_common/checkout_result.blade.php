@extends('layouts.frontend')

@section('content')
	<div class="text-center text-uppercase">
		@if($status == 0)
			<h2>Status: Pago pendiente.</h2>
			<p>Hubo un inconveniente al intentar realizar el pago. Te pedimos por favor que intentes nuevamente.</p>
			<p><a href="{{ route('frontend.retry_process_order', ['id' => $order_id]) }}" class="btn btn-primary">Reintentar</a></p>
		@elseif($status ==1)
			<h2>Status: Pago realizado correctamente.</h2>
			<p>Hemos procesado tu pago. Tu orden tiene el ID: {{ $order_id}} y ha sido incorporado a tu lista de ordenes.</p>
			<p><a href="{{ route('frontend.user_orders') }}" class="btn btn-primary">Mis ordenes</a></p>
		@else
			<h2>Status: Pago no procesado.</h2>
			<p>Desafortunadamente no hemos podido procesar tu pago de la orden con el ID: {{ $order_id}}.</p>
			<p>Puedes comunicarte a travez de algunos de nuestros medios de contacto para brindarte ayuda o bien reintentar desde el siguiente enlace.</p>
			<p><a href="{{ route('frontend.retry_process_order', ['id' => $order_id]) }}" class="btn btn-primary">Reintentar</a></p>
		@endif
	</div>
@endsection
