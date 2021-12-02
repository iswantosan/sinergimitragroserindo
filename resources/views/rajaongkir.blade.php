@extends('layout.template')

@section('content')
	
	<div class="col-md-6">
		<form method="post" action="{{ Url('/process') }}"/>
			@csrf
			<div class="mb-3">
				<label class="form-label">Provinsi</label>
				<select class="form-control" id="provinsi" requireD>
					<option value=""></option>
					@foreach($provinces as $p)	
						<option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Kota</label>
				<select class="form-control" id="kota" requireD>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Kurir</label>
				<select class="form-control" id="kurir" requireD>
					<option value=""></option>
					<option value="jne">JNE</option>
					<option value="pos">POS</option>
					<option value="tiki">TIKI</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Berat</label>
				<input type="number" id="berat" class="form-control" min="1" required/>
			</div>
			<button type="button" id="btn" class="btn btn-primary">Submit</button>
			
			<div id="divResult">
			</div>
		</form>
	</div>
	<script>
		$(document).ready(function()
		{
			$("#btn").click(function()
			{
				
				var kota = $("#kota").val();
				var berat = $("#berat").val();
				var kurir = $("#kurir").val();
				
				if(kota != "")
				{
					$.ajax({
						method:"GET",
						data:{
							
							kota:kota,
							berat:berat,
							kurir:kurir
							
						},
						url:"{{ Url('/weight') }}",
						success:function(data)
						{
							$("#divResult").html(data);
						},
						error:function()
						{
							alert("Gagal!!");
						}
					});
				}
			});
			
			$("#provinsi").change(function()
			{
				var val = $(this).val();
				$("#kota").html("");
				if(val != "")
				{
					$.ajax({
						method:"GET",
						data:{
							id:val,
						},
						url:"{{ Url('/kota') }}",
						success:function(data)
						{
							$("#kota").html(data);
						},
						error:function()
						{
							alert("Gagal!!");
						}
					});
				}
			});
			$("select").select2();
			$("#provinsi").trigger("change");
		});
	</script>
@endsection