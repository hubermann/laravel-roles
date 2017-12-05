
@extends('layouts.backend')

@section('content')

<style>
	#field {
    margin-bottom:20px;
}
</style>
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Agregar una imagen</h3>

				<form action="{{ route('backend.products.upload_image') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>

				<input type="hidden" name="id" id="id" value="{{$product->id}}">

				<div class="form-group">
					<label for="title">File</label>
						<input type="file" name="input_img" id="input_img">
					
				
					@if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('category') }}</strong>
              </span>
          @endif
				</div>


				<div class="form-group">
					<button class="btn btn-primary" type="submit">Create</button>
				</div>

				</fieldset>
				</form>


			</div>
	</div>
</div>
<!-- /.row -->
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Images products</h3>

				<div class="row">
						<?php $counter = 0 ?>
  					@foreach($images as $image)
					  <div class="col-md-4">
					    <div class="thumbnail">
					        <img src="{{'/images-products/'.$image->filename}}" alt="image" style="width:100%">
					        <div class="caption">
					          <p><span class="btn btn-small btn-danger">Remover</span></p>
					        </div>
					    </div>
					  </div>
					  <?php  $counter++; if($counter==3){ echo "</div><div class=\"row\">"; $counter=0;} ?>
					  @endforeach
				</div>


			</div>
	</div>
</div>
<!-- /.row -->
@endsection


