<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return response()->json(['data'=>Jurusan::all()]);
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
        Request()->validate([
            'nama'=>'required',
            'kode'=>'required'
        ]);
        $id =  Jurusan::create(Request()->all())->id;
        return response()->json(['data'=>Jurusan::find($id)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
                return response()->json(['data'=>$jurusan]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return response()->json(['data'=>$jurusan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        Request()->validate([
            'nama'=>'required',
            'kode'=>'required'
        ]);
        $jurusan->update(Request()->all());
        return response()->json(['data'=>$jurusan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return response()->json(['msg'=>"Data berhasil di hapus"]);
    }
}
