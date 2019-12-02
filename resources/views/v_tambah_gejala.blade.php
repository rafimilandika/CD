@extends('layouts.nav2')

@section('contentuser')
<!-- TAMBAH GEJALA
<form method="post" action="/tambah_gejala/input">
	{{ csrf_field() }}
	<input type="text" name="nama" placeholder="nama gejala">
	<input type="submit" name="simpan">
</form>
<a href="/home_admin">Kembali</a><br>
 -->

<section class="content" style=" margin: 10%; margin-top: 2%">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong>List Gejala</strong></h2><br/>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="float: right;">
							Tambah Gejala
						</button>
					</div>
					<form method="POST" action="{{ route('diagnosa.store') }}">
						@csrf
						<div class="card-body">
							<div class="card-body p-0">
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
											<td id="{{$value -> id_gejala}}" value="{{$value -> id_gejala}}" name="id"><a href="{{ route('hapus_gejala',[$value -> id_gejala])}}" class="btn btn-info ">Hapus</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
							</div>         
						</div>
						<!-- /.card-body -->
            <!-- <div class="card-footer">

            </div> -->
        </form>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</div>
</div>
<!-- </div> -->
</section>



<div class="modal fade" id="modal-default" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Gejala</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>

				</div>
				<div class="modal-body" >
					<div class="col-md-12">
						<form class="form-horizontal" method = "POST" action = "/tambah_gejala/input">
							@csrf
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Nama Gejala</label>
								<input type="text" class="form-control" id="inputEmail3" placeholder="Nama Gejala" name="nama">
								<input type="hidden" name="admin" value="{{Auth::user()->id}}">
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