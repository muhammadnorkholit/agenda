<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Jam;
use App\Models\Guru;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return response()->json(['data'=>Jadwal::with('kelas')->with('jam')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
       return response()->json(['kelas'=>Kelas::all(),'jam'=>Jam::all(),'guru'=>Guru::with('mapel')->get()]);
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
            'code_guru'=>'required',
            'id_kelas'=>'required',
            'id_jam'=>'required'
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
    public function show(Kelas $kelas)
    {
        return response()->json(['data'=>$kelas]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return response()->json(['data'=>$kelas,'kelas'=>Kelas::all(),'jam'=>Jam::all(),'guru'=>Guru::with('mapel')->get()]);

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
            'code_guru'=>'required',
            'id_kelas'=>'required',
            'id_jam'=>'required'
        ]);
        $kelas->update(Request()->all());
        return response()->json(['data'=>$Kelas]);
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
