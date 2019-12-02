@extends('layouts.nav2')

@section('contentuser')
<!-- 
<br>NAMA<br>
{{$nama}}<br>
GEJALA<br>
<a href="/list_gejala_admin">tambah gejala</a><br>
<a href="/selesai">selesai</a><br>
<table>
	<tr>
		<th>Nama</th>
	</tr>
	@foreach($gp as $key=> $value)
	<tr>
		<td>{{$value -> nama_gejala}}</td>
		<td id="{{$value -> id_detail_penyakit}}" value="{{$value -> id_detail_penyakit}}" name="id"><a href="{{ route('hapus_detail_tambah',[$value -> id_detail_penyakit])}}" class="btn btn-info ">Hapus</a></td>
	</tr>
	@endforeach
</table>
 -->

<section class="content" style=" margin: 10%; margin-top: 2%">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong>List Gejala</strong></h2><br/>
						<i></i>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default-lg" style="float: right;">
							Tambah Gejala
						</button>
					</div>
					<div>
						<table class="table table-striped">
							<thead>
								<tr style="text-align: center;">
									<th>Nama</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($gp as $key=> $value)
								<tr style="text-align: center;">
									<td>{{$value -> nama_gejala}}</td>
									<td id="{{$value -> id_detail_penyakit}}" value="{{$value -> id_detail_penyakit}}" name="id"><a href="{{route('hapus_detail_tambah',[$value -> id_detail_penyakit])}}" class="btn btn-danger ">Hapus</a></td>
								</tr>

								@endforeach

							</tbody>
						</table>
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- </div> -->
	</section>

	<?php 
	use App\m_diagnosa;
	$gejala = m_diagnosa::all();
	?>

	<div class="modal fade" id="modal-default-lg">
		<div class="modal-dialog">
			<div class="modal-content"  style="width: 160%; margin-left: -30%;">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Gejala</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body" >
						<div class="col-md-12">
							<table class="table table-striped">
								<thead>
									<tr style="text-align: center;">
										<th>No</th>
										<th>Gejala</th>
										<th>Pilih</th>
									</tr>
								</thead>
								<tbody>
									@foreach($gejala as $key=> $value)
									<tr>
										<td style="text-align: center;">{{ $value -> id_gejala }}</td>
										<td style="padding-left:8%;">{{ $value -> nama_gejala}}</td>
										<td style="text-align: center;"><a href="{{ route('pilih_admin',[$value -> id_gejala])}}" class="btn btn-info ">pilih</a> </td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>

		@endsection