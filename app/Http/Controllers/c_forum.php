<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\m_forum;
class c_forum extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = DB::SELECT("SELECT * FROM forum order by admin");;
        // dd($q);
        return view('v_forum',['forum' =>$forum]);
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cekid($id)
    {
    
        return view('v_edit_forum',['data'=>m_forum::findOrfail($id)]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
    public function baru_simpan(Request $request)
    {
        $nama = $request->nama;
        $admin = $request->admin;
        $user = $request->input('user');
         DB::INSERT("INSERT INTO forum (nama_forum, admin) VALUES ('$nama', '$admin')");
        if ($user != 'admin@gamil.com') {
         return Redirect()->route('forum');       
        }else{
        return Redirect()->route('forum_admin');
        }    
    }
    public function masuk($id)
    {
        $chat = DB::SELECT("SELECT * FROM chat c Inner join users u on c.id_pengirim = u.id WHERE id_forum = $id order by waktu desc");
        $forum = DB::SELECT("SELECT * FROM forum WHERE id_forum = $id");
        // echo $id;
        return view('v_forum_masuk',['forum' =>$forum, 'chat' =>$chat]);
    }
    public function masuk_admin($id)
    {
         $chat = DB::SELECT("SELECT * FROM chat c Inner join users u on c.id_pengirim = u.id WHERE id_forum = $id order by waktu desc");
        $forum = DB::SELECT("SELECT * FROM forum WHERE id_forum = $id");
        // echo $id;
        return view('v_forum_masuk_admin',['forum' =>$forum, 'chat' =>$chat]);
    }
    public function kirim(Request $request)
    {
        $text = $request->text;
        $id = $request->id;
        $user = $request->user;
        $gambar = $request->gambar;
        
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("Y-m-d H:i:s");
        $nama = DB::SELECT("SELECT * FROM forum WHERE nama_forum = '$id'");
        for ($i=0; $i < count($nama); $i++) { 
            $idnya = $nama[$i]->id_forum;
        }
        if (isset($_POST['keluar'])) {
            return Redirect()->route('forum'); 
        }
        elseif(empty($gambar) && $text != null){
        
        // echo $idnya." ".$text." ".$user." ".$waktu;
        DB::INSERT("INSERT INTO chat (id_forum, chat, gambar, nama_gambar, id_pengirim, waktu) VALUES ('$idnya', '$text', '', '', '$user', '$waktu')");
        return back();  
        }elseif ($text == null && $gambar == null) {
            return back();
        }else{
            $tujuan = 'data_file';
        $nama_gambar = $gambar->getClientOriginalName();
        $gambar->move($tujuan,$gambar->getClientOriginalName());
        DB::INSERT("INSERT INTO chat (id_forum, chat, gambar, nama_gambar, id_pengirim, waktu) VALUES ('$idnya', '$text', '$gambar', '$nama_gambar', '$user', '$waktu')");
        return back();
        }  
    }
    public function hapus($id)
    {
        $kamar = DB::table('forum')->where('id_forum',$id)->delete();
            return back();
    }
    public function edit($id)
    {
        $forum = DB::SELECT("SELECT * FROM forum WHERE id_forum = $id");
        return back(); 
    }
    public function input_edit(Request $request)
    {
        $nama = $request->nama;
        $id = $request->id;
        $admin = $request->admin;
        $user = $request->input('user');
        DB::UPDATE("UPDATE forum SET nama_forum = '$nama' WHERE id_forum = '$id' and admin = '$admin'");
        if ($user != 'admin@gamil.com') {
         return Redirect()->route('forum');       
        }else{
        return Redirect()->route('forum_admin');
        }
    }
    public function forum_admin()
    {
        $forum = DB::SELECT("SELECT * FROM forum f inner join users s on f.admin = s.id");
        return view('v_forum_admin',['forum' =>$forum]);
        
    }
}
