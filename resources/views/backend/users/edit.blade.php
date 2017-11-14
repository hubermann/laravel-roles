
@extends('layouts.backend')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			

				@foreach ($users as $user)
					<form action="{{ route('backend.users.update') }}" method="post">
					{{ csrf_field() }}
					

					<p>{{ $user->email }} {{ $user->name }} {{ $user->role}} <input type="hidden" name="email" value="{{ $user->email }}">
						<input type="checkbox" <?= $user->hasRole('Superadmin') ? "checked" : "" ?> name="role_superadmin" /></td>
						<input type="checkbox" <?= $user->hasRole('Frontend') ? "checked" : "" ?> name="role_frontend"></td>
						<input type="submit" value="Enviar"></p>
						
					</form>
				@endforeach


		</div>
	</div>
</div>

@endsection