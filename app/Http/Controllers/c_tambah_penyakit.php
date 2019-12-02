<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class c_tambah_penyakit extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = DB::SELECT("SELECT * FROM penyakit");
        return view('v_tambah_penyakit',['penyakit' =>$penyakit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
        return view('v_penyakit_baru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request)
    {
        $nama_penyakit = $request->nama;
        $request->session()->put('nama_p', $nama_penyakit);
        $penjelasan = $request->penjelasan;
        $penanganan = $request->penanganan;
        $cek = DB::SELECT("SELECT * FROM penyakit WHERE nama_penyakit = '$nama_penyakit'");
        if (empty($cek)) {
            
            DB::INSERT("INSERT INTO penyakit (nama_penyakit, penjelasan, penanganan) VALUES ('$nama_penyakit','$penjelasan', '$penanganan')");
            $request->session()->put('nama_penyakit', $nama_penyakit);
            $id = DB::SELECT("SELECT * FROM penyakit WHERE nama_penyakit = '$nama_penyakit'");
            for ($i=0; $i < count($id); $i++) { 
                $idnya = $id[$i]->id_penyakit;
            }
            $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g WHERE dp.id_penyakit = '$idnya'");
            return view('v_gejala_penyakit', ['nama' =>$nama_penyakit, 'gp' =>$gp]);
        }else{
            
            return Redirect()->route('tambah_penyakit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        echo $id;
        $hapus = DB::table('penyakit')->where('id_penyakit',$id)->delete();
        $hapus2 = DB::table('detail_penyakit')->where('id_penyakit',$id)->delete();
        return back();
    }


    public function list(Request $request)
    {
        $nama = $request->session()->get('nama_penyakit');
        // echo $nama;
        $gejala = DB::SELECT("SELECT * FROM gejala");
        return view('v_list_gejala',['gejala' =>$gejala, 'nama' =>$nama]);
    }
    public function pilih(Request $request,$id)
    {
        $detail = DB::SELECT("SELECT * FROM gejala where id_gejala = '$id'");
        for ($i=0; $i < count($detail); $i++) { 
                $nama = $detail[$i]->nama_gejala;
            }
            // echo $nama;
        // $request->session()->put('id_gejala', $id);
        // echo $id;
        // return view('v_bobot',['nama' =>$nama]);
        $bobot = 1;
        // echo $bobot;
        $nama = $request->session()->get('nama_penyakit');
        $idnya = DB::SELECT("SELECT * FROM penyakit where nama_penyakit = '$nama'");
        for ($i=0; $i < count($idnya); $i++) { 
                $idp = $idnya[$i]->id_penyakit;
            }
            // echo $idp;
        // echo $nama;
        // $id = $request->session()->get('id_gejala');
        // echo $id;
        DB::INSERT("INSERT INTO detail_penyakit (id_penyakit, id_gejala, bobot_gejala) VALUES ('$idp','$id', '$bobot')");
        // return view('v_gejala_penyakit');
        $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g ON dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$idp'");
        return view('v_gejala_penyakit', ['nama' =>$nama, 'gp' =>$gp]);
        // return back();
        // return Redirect()->route('input_penyakit');
        
    }
    
    public function bobot(Request $request)
    {
        $bobot = 1;
        // echo $bobot;
        $nama = $request->session()->get('nama_penyakit');
        $idnya = DB::SELECT("SELECT * FROM penyakit where nama_penyakit = '$nama'");
        for ($i=0; $i < count($idnya); $i++) { 
                $idp = $idnya[$i]->id_penyakit;
            }
            // echo $idp;
        // echo $nama;
        $id = $request->session()->get('id_gejala');
        // echo $id;
        DB::INSERT("INSERT INTO detail_penyakit (id_penyakit, id_gejala, bobot_gejala) VALUES ('$idp','$id', '$bobot')");
        // return view('v_gejala_penyakit');
        $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g ON dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$idp'");
        return view('v_gejala_penyakit', ['nama' =>$nama, 'gp' =>$gp]);
        // return Redirect()->route('input_penyakit');
    }
    public function gejala_baru(Request $request)
    {
        $nama = $request->nama_gejala;
        $bobot = 1;
        $gejala = DB::SELECT("SELECT * FROM gejala where nama_gejala");
        if (empty($gejala)) {
            DB::INSERT("INSERT INTO gejala (nama_gejala) VALUES ('$nama')");
            $idnya = DB::SELECT("SELECT * FROM gejala where nama_gejala = '$nama'");
            for ($i=0; $i < count($idnya); $i++) { 
                $idg = $idnya[$i]->id_gejala;
            }
            $namap = $request->session()->get('nama_penyakit');
            $idnya2 = DB::SELECT("SELECT * FROM penyakit where nama_penyakit = '$namap'");
            for ($i=0; $i < count($idnya2); $i++) { 
                $idp = $idnya2[$i]->id_penyakit;
            }
            // echo $idp." ".$idg;
            DB::INSERT("INSERT INTO detail_penyakit (id_penyakit, id_gejala, bobot_gejala) VALUES ('$idp','$idg', '$bobot')");
            $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g ON dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$idp'");
        return view('v_gejala_penyakit', ['nama' =>$namap, 'gp' =>$gp]);
        }

    }
    public function hapus_detail(Request $request,$id)
    {
        // echo $id;
        $hapus = DB::table('detail_penyakit')->where('id_detail_penyakit',$id)->delete();
        $namap = $request->session()->get('nama_penyakit');
        $idnya2 = DB::SELECT("SELECT * FROM penyakit where nama_penyakit = '$namap'");
            for ($i=0; $i < count($idnya2); $i++) { 
                $idp = $idnya2[$i]->id_penyakit;
            }
        $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g ON dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$idp'");
        return view('v_gejala_penyakit', ['nama' =>$namap, 'gp' =>$gp]);
    }
    public function selesai()
    {
        return view('v_home_admin');
    }
    public function detail(Request $request,$id)
    {
        // echo $id;
        $request->session()->put('iid', $id);
        $hasil = DB::SELECT("SELECT * FROM detail_penyakit as dp inner join penyakit as p on dp.id_penyakit = p.id_penyakit inner join gejala as g on dp.id_gejala = g.id_gejala where dp.id_penyakit = '$id'");
        $nama = $hasil[0]->nama_penyakit;
        $penjelasan = $hasil[0]->penjelasan;
        $penanganan = $hasil[0]->penanganan;
        for ($i=0; $i < count($hasil); $i++) { 
            $gejala[$i] = $hasil[$i]->nama_gejala;
        }
        // var_dump($gejala);
        return view('v_edit_penyakit',['nama'=>$nama, 'penjelasan' =>$penjelasan, 'penanganan' =>$penanganan, 'gejala' =>$gejala, 'gejala2' =>$hasil]);
    }
    public function ubah(Request $request)
    {
       $iid = $request->session()->get('iid');
       $jelas = DB::SELECT("SELECT * FROM penyakit where id_penyakit = '$iid'");
       return view('v_ubah_penyakit',['jelas'=>$jelas]);
    }
    public function update_penjelasan(Request $request)
    {
        $iid = $request->session()->get('iid');
        $nama_penyakit = $request->nama;
        $penjelasan = $request->penjelasan;
        $penanganan = $request->penanganan;
        DB::UPDATE("UPDATE penyakit SET nama_penyakit = '$nama_penyakit', penjelasan = '$penjelasan', penanganan = '$penanganan' WHERE id_penyakit = '$iid'");
        return view('v_home_admin');
    }
    public function ubah2(Request $request)
    {
       $iid = $request->session()->get('iid');
            $nama = DB::SELECT("SELECT * FROM penyakit WHERE id_penyakit = '$iid'");
            for ($i=0; $i < count($nama); $i++) { 
                $nama_penyakit = $nama[$i]->nama_penyakit;
            }
            // $request->session()->put('nama_p', $nama_penyakit);
            // echo $nama_penyakit;
            // $gp = DB::SELECT("SELECT * FROM detail_penyakit WHERE id_penyakit = '$iid'");
            $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g on dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$iid'");
            // dd($gp);
            return view('v_gejala_penyakit', ['nama' =>$nama_penyakit, 'gp' =>$gp]);
    }
    public function list_admin(Request $request)
    {
        $nama = $request->session()->get('nama_p');
        // echo $nama;
        $gejala = DB::SELECT("SELECT * FROM gejala");
        return view('v_list_gejala',['gejala' =>$gejala, 'nama' =>$nama]);
    }
    public function pilih_admin(Request $request,$id)
    {
        $detail = DB::SELECT("SELECT * FROM gejala where id_gejala = '$id'");
        for ($i=0; $i < count($detail); $i++) { 
                $nama = $detail[$i]->nama_gejala;
            }
            // echo $nama;
        // $request->session()->put('id_gejala', $id);
        // echo $id;
        // return view('v_bobot',['nama' =>$nama]);
        $bobot = 1;
        // echo $bobot;
        $nama2 = $request->session()->get('nama_p');
        $idnya = DB::SELECT("SELECT * FROM penyakit where nama_penyakit = '$nama2'");
        for ($i=0; $i < count($idnya); $i++) { 
                $idp = $idnya[$i]->id_penyakit;
            }
            // echo $nama2;
            // echo $idp;
        // echo $nama;
        // $id = $request->session()->get('id_gejala');
        // echo $id;


        DB::INSERT("INSERT INTO detail_penyakit (id_penyakit, id_gejala, bobot_gejala) VALUES ('$idp','$id', '$bobot')");
        $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g ON dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$idp'");
        return view('v_gejala_penyakit', ['nama' =>$nama, 'gp' =>$gp]);

        
    }
    public function hapus_detail_tambah(Request $request,$id)
    {
        // echo $id;
        $hapus = DB::table('detail_penyakit')->where('id_detail_penyakit',$id)->delete();
        $namap = $request->session()->get('nama_p');
        $idnya2 = DB::SELECT("SELECT * FROM penyakit where nama_penyakit = '$namap'");
            for ($i=0; $i < count($idnya2); $i++) { 
                $idp = $idnya2[$i]->id_penyakit;
            }
        $gp = DB::SELECT("SELECT * FROM detail_penyakit as dp INNER JOIN gejala as g ON dp.id_gejala = g.id_gejala WHERE dp.id_penyakit = '$idp'");
        return view('v_gejala_penyakit', ['nama' =>$namap, 'gp' =>$gp]);
    }
}
