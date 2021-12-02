@extends('layout.template')

@section('content')
	<div class="col-md-6">
		<form method="post" action="{{ Url('/process') }}"/>
			@csrf
			<div class="mb-3">
				<label class="form-label">Bilangan</label>
				<input class="form-control" type="number" min='0' required autofocus name='bilangan'/>			
				
				@if($errors->has('isi_email'))
					<span class="text-danger">{{ $errors->first('isi_email') }}</span>
				@endif
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection