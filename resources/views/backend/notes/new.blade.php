@extends('layouts.backend')

@section('content')



    
<div class="container">
	<div class="row">
		<div class="col-md-12">
		
			<div class="form">
			
				<form action="{{ route('backend.notes.create') }}" method="post">
				{{ csrf_field() }}
					<fieldset>

						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control">
						</div>

						<div class="form-group">
							<label for="title">Description</label>
							<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<button class="btn btn-primary" type="submit">Create</button>
						</div>

					</fieldset>
				</form>

			</div>
		</div>
	</div>

</div>
@endsection