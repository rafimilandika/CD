TAMBAH GEJALA<br>
<form method="post" action="/gejala_baru">
	{{ csrf_field() }}
	<input type="text" name="nama_gejala" placeholder="nama gejala">
	<input type="submit" name="kirim">
</form>
DAFTAR GEJALA
<table>
	<tr>
		<th>ID</th>
		<th>Nama</th>
	</tr>
	@foreach($gejala as $key=> $value)
	<tr>
		<td>{{$value -> id_gejala}}</td>
		<td>{{$value -> nama_gejala}}</td>
		<td id="{{$value -> id_gejala}}" value="{{$value -> id_gejala}}" name="id"><a href="{{ route('pilih',[$value -> id_gejala])}}" class="btn btn-info ">pilih</a> <a href="" class="btn btn-danger ">Hapus</a></td>
	</tr>
	@endforeach
</table>