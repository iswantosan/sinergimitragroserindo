@extends('layout.template')

@section('content')
	<div class="col-md-6">
		@php
			$counter = 0;
		@endphp
		
		@for($i = 0;$i < $bilangan;$i++)
			
			@if($bilangan % 3 == 0 && $bilangan % 5 == 0)
				{{ "Pasar 20 Belanja Pangan" }} <br/>
				@php
					$counter++
				@endphp
			@elseif($bilangan % 3 == 0)
				{{ $counter >= 2 ? "Belanja Pangan" : "Pasar 20" }}<br/>
			@elseif($bilangan %5 == 0)
				{{ $counter >= 2 ? "Pasar 20" : "Belanja Pangan" }}<br/>
			@endif
			
			@if($counter > 5) 
				@break
			@endif
		@endfor
	</div>
@endsection