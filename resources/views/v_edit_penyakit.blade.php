@extends('layouts.nav2')

@section('contentuser')
<section class="content" style=" margin: 10%; margin-top: 2%;padding-top: 8%">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong><center>Detail Penyakit</center></strong></h2><br/>
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
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
							Edit Penyakit
						</button>
							<a href="{{ route('ubah_gejala') }}"><button>Ubah Gejala</button></a>
						</div>
						<!-- /.card-body -->
						<!-- <div class="card-footer">

						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>



<div class="modal fade" id="modal-default" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Penyakit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>

				</div>
				<div class="modal-body" >
					<div class="col-md-12">
						<form class="form-horizontal" method = "POST" action = "/update_penjelasan">
							@csrf
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Nama Penyakit</label>
								<input type="text" class="form-control" id="inputEmail3" placeholder="Nama Forum" name="nama" value="{{$nama}}">
								<input type="hidden" name="admin" value="{{Auth::user()->id}}">
							</div>
							<div class="form-group">
								<label>Penjelasan</label>
								<textarea class="form-control" rows="3" placeholder="Penjelasan penyakit" name="penjelasan">{{$penjelasan}}</textarea>
							</div>
							<div class="form-group">
								<label>Penanganan</label>
								<textarea class="form-control" rows="3" placeholder="Penanganan penyakit" name="penanganan">{{$penanganan}}</textarea>
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>

					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
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