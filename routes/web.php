<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/nav', function(){
	return view('layouts/nav');
});

// route::get('/diagnosa', function(){
	// return get('v_diagnosa');
// });

// route::get('hasildiagnosa', function(){
// 	return view('v_hasil_diagnosa');
// });

route::resource('diagnosa', 'c_diagnosa');
route::get('/diagnosacoba', 'c_diagnosa@cekdiagnosa')->name('diagnosacoba');
route::get('kembali', 'c_diagnosa@updatestatus')->name('kembali');
route::get('kembalii', function(){
	return view('v_tes');
})->name('kembalii');

route::resource('informasi', 'c_informasi');
route::get('/diagnosa/hasil/{id}','c_diagnosa@hasil')->name('hasil');
route::get('/forum','c_forum@index')->name('forum');
Route::get('/baru', function () {
    return view('v_forum_baru');
});
route::post('/forum/baru_simpan','c_forum@baru_simpan')->name('baru_simpan');
route::get('/masuk_forum/{id}','c_forum@masuk')->name('masuk');
route::post('/kirim','c_forum@kirim')->name('kirim');
route::get('/hapus/{id}','c_forum@hapus')->name('hapus');
route::get('/edit/{id}','c_forum@edit')->name('edit');
route::post('/input_edit','c_forum@input_edit')->name('input_edit');
Route::get('/home_admin', function () {
    return view('v_home_admin');
});

route::get('/t_penyakit/{id}','c_tambah_penyakit@destroy')->name('t_penyakit');

route::get('/tambah_gejala','c_tambah_gejala@index')->name('tambah_gejala');
route::get('/hapus_gejala/{id}','c_tambah_gejala@hapus')->name('hapus_gejala');
route::post('/tambah_gejala/input','c_tambah_gejala@input')->name('input_gejala');
route::get('/tambah_penyakit','c_tambah_penyakit@index')->name('tambah_penyakit');
route::get('/penyakit_baru','c_tambah_penyakit@baru')->name('penyakit_baru');
route::post('/tambah_penyakit/input','c_tambah_penyakit@input')->name('input_penyakit');
route::get('/list_gejala','c_tambah_penyakit@list')->name('list_gejala');
route::get('/list_gejala_admin','c_tambah_penyakit@list_admin')->name('list_gejala_admin');
route::get('/pilih/{id}','c_tambah_penyakit@pilih')->name('pilih');
route::get('/pilih_admin/{id}','c_tambah_penyakit@pilih_admin')->name('pilih_admin');
route::post('/input_bobot','c_tambah_penyakit@bobot')->name('input_bobot');
route::post('/gejala_baru','c_tambah_penyakit@gejala_baru')->name('gejala_baru');
route::get('/hapus_detail/{id}','c_tambah_penyakit@hapus_detail')->name('hapus_detail');
route::get('/hapus_detail_tambah/{id}','c_tambah_penyakit@hapus_detail_tambah')->name('hapus_detail_tambah');
route::get('/selesai','c_tambah_penyakit@selesai')->name('selesai');
route::get('/det_penyakit/{id}','c_tambah_penyakit@detail')->name('det_penyakit');
route::get('/forum_admin','c_forum@forum_admin')->name('forum_admin');
route::get('/masuk_forum_admin/{id}','c_forum@masuk_admin')->name('masuk_admin');
route::get('/cekid/{id}','c_forum@cekid')->name('cekid');
// route::get('/cekid/{id}','c_forum@cekid_admin')->name('cekid_admin');
route::get('/ubah_penyakit','c_tambah_penyakit@ubah')->name('ubah_penyakit');
route::post('/update_penjelasan','c_tambah_penyakit@update_penjelasan')->name('update_penjelasan');
route::get('/ubah_gejala','c_tambah_penyakit@ubah2')->name('ubah_gejala');
// route::resource('pertanyaan','c_pertanyaan_diagnosa');

// route::get('tanya/{id}', 'c_pertanyaan_diagnosa@show');