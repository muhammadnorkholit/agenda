<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return response()->json(['data'=>Kelas::with('jurusan')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return response()->json(['data'=>Jurusan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        Request()->validate([
            'kelas'=>'required',
            'no_kelas'=>'required',
            'id_jurusan'=>'required'
        ]);
        $id =  Kelas::create(Request()->all())->id;
        return response()->json(['data'=>Kelas::find($id)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data'=>Kelas::with('jurusan')->where('id',$id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        return response()->json(['data'=>Kelas::find($id),'jurusan'=>Jurusan::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Kelas $kelas)
    {
        Request()->validate([
            'kelas'=>'required',
            'no_kelas'=>'required',
            'id_jurusan'=>'required'
        ]);
        $kelas->update(Request()->all());
        return response()->json(['data'=>$kelas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return response()->json(['msg'=>"Data berhasil di hapus"]);
    }
}
