<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\m_informasi;

class c_informasi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = m_informasi::all();
        return view("informasi", [
            'data' => $penyakit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hasil = DB::SELECT("SELECT * FROM detail_penyakit as dp inner join penyakit as p on dp.id_penyakit = p.id_penyakit inner join gejala as g on dp.id_gejala = g.id_gejala where dp.id_penyakit = '$id'");
        $nama = $hasil[0]->nama_penyakit;
        $penjelasan = $hasil[0]->penjelasan;
        $penanganan = $hasil[0]->penanganan;
        for ($i=0; $i < count($hasil); $i++) { 
            $gejala[$i] = $hasil[$i]->nama_gejala;
        }
        // var_dump($gejala);
        return view('v_detail_penyakit',['nama'=>$nama, 'penjelasan' =>$penjelasan, 'penanganan' =>$penanganan, 'gejala' =>$gejala, 'gejala2' =>$hasil]);

            # code...
            // $penjelasan = $hasil[$id]->penjelasan;
        // echo $nama;
        // echo $penjelasan;
        // echo $gejala;
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
