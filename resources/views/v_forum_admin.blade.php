
@extends('layouts.nav2')

@section('contentuser')

<section class="content" style=" margin: 10%; margin-top: 2%">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong>List Forum</strong></h2><br/>
						<i>{{Auth::user()->name}}, mari berdiskusi</i>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="float: right;">
							Buat Forum
						</button>
					</div>
					<div>
						<table class="table table-striped">
							<thead>
								<tr style="text-align: center;">
									<th>Admin Forum</th>
									<th>Nama Forum</th>
									<th colspan="3">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($forum as $key=> $value)

								<?php
								$idd = Auth::user()->id;
								$q_name = DB::SELECT("SELECT * FROM FORUM f inner JOIN users u on f.admin = u.id where f.admin = '$value->admin'");
								$user=null;
								if (Auth::user()->id==$value->admin) {
									$user="Anda";
								} else{
									$user = $q_name[0]->name;
								}
								?>

								<tr style="text-align: center;">
									<td>{{$user}}</td>
									<td>{{$value -> nama_forum}}</td>
									<td id="{{$value -> id_forum}}" value="{{$value -> id_forum}}" name="id"><a href="{{ route('masuk_admin',[$value -> id_forum])}}"><button type="button" class="btn btn-block btn-success">Masuk</button></a></td>
									<td id="{{$value -> id_forum}}" value="{{$value -> id_forum}}" name="id"><a href="{{ route('hapus',[$value -> id_forum])}}"><button type="button" class="btn btn-block btn-danger">Hapus</button></a></td>
									<td id="{{$value -> id_forum}}" value="{{$value -> id_forum}}" name="edit"><a href="{{ route('cekid',[$value -> id_forum])}}"><button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-warning">Edit</button></a></td>
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


			<div class="modal fade" id="modal-default" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Forum</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>

							</div>
							<div class="modal-body" >
								<div class="col-md-12">
									<form class="form-horizontal" method = "POST" action = "{{route('baru_simpan')}}">
										@csrf
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-5 control-label">Nama Forum</label>
											<input type="hidden" name="user" value="{{Auth::user()->email}}">
											<input type="text" class="form-control" id="inputEmail3" placeholder="Nama Forum" name="nama">
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