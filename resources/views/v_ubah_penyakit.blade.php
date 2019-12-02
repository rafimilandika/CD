@extends('layouts.nav2')

@section('contentuser')
UBAH PENYAKIT
<form method="post" action="/update_penjelasan">
		{{ csrf_field() }}

	@foreach($jelas as $key=>$value)
	Nama<br>
	<input type="text" name="nama" value="{{$value->nama_penyakit}}"><br>
	Penjelasan<br>
	<input type="text" name="penjelasan" value="{{$value->penjelasan}}"><br>
	Penanganan<br>
	<input type="text" name="penanganan" value="{{$value->penanganan}}"><br>
	<input type="submit" name="simpan">
@endforeach

</form>
@endsection

