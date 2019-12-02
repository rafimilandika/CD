@extends('layouts.nonav')

@section('contentuser')

<!-- <form method="post" action="/input_edit">
	{{ csrf_field() }}
	masukkan nama forum baru<br>
	<input type="text" name="nama" value="{{$data->nama_forum}}">
	<input type="hidden" name="id" value="{{$data->id_forum}}">
	<input type="hidden" name="admin" value="{{$data->admin}}">
	<input type="hidden" name="user" value="{{Auth::user()->email}}">
	<input type="submit" name="simpan" value="Simpan">

</form>
 -->

<section class="content" style=" margin: 2%; margin-left: 8%;">
	<!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
		<div class="row">
			<div class="col-11">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><strong>Edit Forum</strong></h2>
						<i style="float: right;"></i>
					</div>
					<div class="card-body">
						<div class="card-body p-0">
							<form method="post"  action="/input_edit">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$data->id_forum}}">
								<input type="hidden" name="admin" value="{{$data->admin}}">
								<input type="hidden" name="user" value="{{Auth::user()->email}}">
								<div class="input-group" style="height: 5%;">
									<input type="textarea" name="nama" value="{{$data->nama_forum}}" class="form-control">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary btn-flat" name="kirim">Simpan</button>
									</span>
								</div> <br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection