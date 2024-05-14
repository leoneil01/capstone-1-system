@if (session()->has('message_success'))
	<div class="alert alert-success" role="alert">
		{{ session('message_success') }}
	</div>
@endif

@if (session()->has('message_error'))
	<div class="alert alert-danger" role="alert">
		{{ session('message_error') }}
	</div>
@endif