@extends('layouts.nonav')

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
								@foreach($detail as $key=> $value)
								<tr>
									<th>Nama Penyakit</th>
									<td>{{$value -> nama_penyakit}}</td>
								</tr>
								<tr>
									<th>Gejala yang dipilih</th>
									<td>
											@foreach($gejala as $key=>$value)
											<li>{{ $value->nama_gejala}}</li>
											@endforeach
									</td>
								</tr>
								<tr>
									<th>Penjelasan</th>
									<td>{{$value -> penjelasan}}</td>
								</tr>
								<tr>
									<th>Penanganan</th>
									<td>{{$value -> penanganan}}</td>
								</tr>
								@endforeach
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