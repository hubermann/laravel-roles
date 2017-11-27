@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Subcategorias
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.subcategories.new') }}"> + SubCategoria </a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					@unless($subcategories->count())
					    <p>No items.</p>
					@else
						<thead>
							<thead>
								<th>title</th>
								<th>description</th>
								<th class="text-right">Opciones</th>
							</thead>
							<tbody>
								@foreach($subcategories as $subcategory)
									<tr>
										<td>{{ $subcategory->name }}</td>
										<td>
											<div class="btn-group pull-right">
											<a class="btn btn-small" href="'.base_url('control/notas/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
											<a class="btn btn-small" href="'.base_url('control/notas/imagenes/'.$row->id.'').'"><i class="fa fa-camera-retro"></i></a>
											<a href="{ route('backend.categories.destroy', ['id' => $category->id]) }}" class="delete btn btn-small" data-confirm="Confirma eliminar ésta Subcategoria? - Todos sus productos dependientes tambien serán eliminados de manera definitiva."><i class="fa fa-trash-o"></i></a>	
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
