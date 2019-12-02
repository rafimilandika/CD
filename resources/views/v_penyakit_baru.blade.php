TAMBAH PENYAKIT
<form method="post" action="/tambah_penyakit/input">
	  {{ csrf_field() }}
	Nama Penyakit<br>
	<input type="text" name="nama" placeholder="nama penyakit"><br>
	Penjelasan Penyakit<br>
	<input type="textarea" name="penjelasan" placeholder="penjelasan penyakit"><br>
	Penanganan Penyakit<br>
	<input type="textarea" name="penanganan" placeholder="penanganan penyakit"><br>
	<input type="submit" name="simpan">
</form>