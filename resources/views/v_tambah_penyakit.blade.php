@extends('layouts.nav2')

@section('contentuser')

<section class="content" style=" margin: 10%; margin-top: 2%">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong>List Penyakit</strong></h2><br/>
						<i>Admin dapat menambahkan penyakit disini</i>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="float: right;">
							Tambah Penyakit
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
											<th>Peyakit</th>
											<th style="text-align: center;" colspan="2">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $number=0 ?>
										@foreach($penyakit as $key=> $value)
										<tr>
											<td style="text-align: center;">{{++$number}}</td>
											<td style="text-align: center;">{{$value -> nama_penyakit}}</td>
											<td style="text-align: center; id="{{$value -> id_penyakit}}" value="{{$value -> id_penyakit}}" name="id"><a href="{{ route('det_penyakit',[$value -> id_penyakit])}}" class="btn btn-info ">Detail</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
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
<!-- /.content -->
<!-- </div> -->



<div class="modal fade" id="modal-default" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Penyakit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>

				</div>
				<div class="modal-body" >
					<div class="col-md-12">
						<form class="form-horizontal" method = "POST" action = "tambah_penyakit/input">
							@csrf
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Nama Forum</label>
								<input type="text" class="form-control" id="inputEmail3" placeholder="Nama Forum" name="nama">
								<input type="hidden" name="admin" value="{{Auth::user()->id}}">
							</div>
							<div class="form-group">
								<label>Penjelasan</label>
								<textarea class="form-control" rows="3" placeholder="Penjelasan penyakit"></textarea>
							</div>
							<div class="form-group">
								<label>Penanganan</label>
								<textarea class="form-control" rows="3" placeholder="Penanganan penyakit"></textarea>
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
