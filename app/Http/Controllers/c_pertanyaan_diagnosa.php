<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\m_diagnosa;

class c_pertanyaan_diagnosa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v_pertanyaan_diagnosa');
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
    public function show($id)
    {
        $r=explode("|", $id);
        // print_r($r[1]);
        // var_dump_r($r);

        // if ($id==5) {
        // print_r($r[0]);
        // // print_r("selesi");    
        //     # code...
        // }else{
        //  return view('v_pertanyaan_diagnosa', ['tanya' => m_diagnosa::findOrFail($id)]);
        // }
        // $benar="b";
        // $tidak="t";

        switch ($r[0]) {
            case '1':
                if (in_array("b", $r)) {
                    return view('v_pertanyaan_diagnosa', ['tanya' => m_diagnosa::findOrFail(3)]);
                }else if (in_array("t", $r)){
                    return view('v_pertanyaan_diagnosa', ['tanya' => m_diagnosa::findOrFail(4)]);
                } else{
                    return view('v_pertanyaan_diagnosa', ['tanya' => m_diagnosa::findOrFail(1)]);
                }
                break;
            case '2':
            default:
                return view('v_pertanyaan_diagnosa', ['tanya' => m_diagnosa::findOrFail(1)]);
                break;
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
     * Remove the sp
     ecified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
