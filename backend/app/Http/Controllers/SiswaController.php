<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return response()->json(['data'=>Siswa::with(['kelas'=>function($e){
            $e->with('jurusan');
         }])->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
       return response()->json(['data'=>Kelas::with('jurusan')->get()]);
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
            'nama'=>'required',
            'no_Siswa'=>'required',
            'id_jurusan'=>'required'
        ]);
        $id =  Siswa::create(Request()->all())->id;
        return response()->json(['data'=>Siswa::find($id)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return response()->json(['data'=>$siswa->with(['kelas'=>function($e){
            $e->with('jurusan');
        }])->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return response()->json(['data'=>$siswa,'kelas'=>Kelas::with('jurusan')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        Request()->validate([
            'nama'=>'required',
            'no_Siswa'=>'required',
            'id_jurusan'=>'required'
        ]);
        $siswa->update(Request()->all());
        return response()->json(['data'=>$siswa]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json(['msg'=>"Data berhasil di hapus"]);
    }
}
