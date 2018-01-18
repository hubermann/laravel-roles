@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">{{ $title_page }}
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					@unless($orders->count())
					    <p>No items.</p>
					@else
						<thead>
							<thead>
								<th class="text-left">Email buyer</th>
								<th class="text-left"> Name and lastname</th>
								<th class="text-left"> Payment status</th>
								<th class="text-right"> Options</th>

							</thead>
							<tbody>
								@foreach($orders as $order)
									<tr>
										<td>{{ $order->email }}</td>
										<td>{{ $order->name}}{{ $order->surname}}</td>
										<td>{{ $order->payment_status }}</td>
										<td>
											<div class="btn-group pull-right">
											
											<a href="{{ route('backend.orders.destroy', ['id' => $order->id])}}" class="delete btn btn-small" data-confirm="Confirma eliminar ésta order de manera definitiva."><i class="fa fa-trash-o"></i></a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>

					@endunless
				

				</table> 
			</div>

				<div class="table-responsive">
					<ul class="pagination pagination-small pagination-centered">
						
					</ul>
				</div>
		</div>

	</div>
</div>
<!-- /.row -->

@endsection
