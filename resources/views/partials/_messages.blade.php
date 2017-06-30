@if (Session::has('success'))
	<div class="alert alert-success btn-h1-spacing" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>
@endif

@if (Session::has('danger'))
	<div class="alert alert-danger btn-h1-spacing " role="alert">
		<strong>Danger:</strong> {{ Session::get('danger') }}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif