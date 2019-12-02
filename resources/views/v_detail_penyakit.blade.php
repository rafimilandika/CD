@extends('layouts.nav')

@section('contentuser')
<section class="content" style=" margin: 10%; margin-top: 2%;padding-top: 8%">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong><center>Hasil Diagnosa</center></strong></h2><br/>
					</div>
					<div class="card-body">
						<div class="card-body p-0">
							<table class="table">
								<tr>
									<th>Nama Penyakit</th>
									<td>{{$nama}}</td>
								</tr>
								<tr>
									<th>Gejala normal</th>
									<td>
											@foreach($gejala2 as $key=>$value)
											<li>{{ $value->nama_gejala }}</li>
											@endforeach
									</td>
								</tr>
								<tr>
									<th>Penjelasan</th>
									<td>{{$penjelasan}}</td>
								</tr>
								<tr>
									<th>Penanganan</th>
									<td>{{$penanganan}}</td>
								</tr>
							</table>
							<a href="{{ route('kembali') }}"><button>Kembali</button></a>
						</div>
						<!-- /.card-body -->
						<!-- <div class="card-footer">

						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	@endsection
<!-- 
<!DOCTYPE html>
<html>
<head>
	<title>corn</title>
</head>
<body>
Nama Penyakit:<br>
{{$nama}}<br>
Penjelasan Penyakit:<br>
{{$penjelasan}}<br>
Penanganan Penyakit:<br>
{{$penanganan}}<br>
Gejala Penyakit:<br>
@foreach($gejala2 as $key=>$value)
{{$value->nama_gejala}}<br>
@endforeach
</body>
</html> -->