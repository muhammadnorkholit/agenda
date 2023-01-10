<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return response()->json(['data'=>Jam::all()]);
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
            'hari'=>'required',
            'waktu'=>'required',
        ]);
        $id =  Jam::create(Request()->all())->id;
        return response()->json(['data'=>Jam::find($id)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function show(Jam $jam)
    {
        return response()->json(['data'=>$jam]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function edit(Jam $jam)
    {
         return response()->json(['data'=>$jam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jam $jam)
    {
        Request()->validate([
            'hari'=>'required',
            'waktu'=>'required',
        ]);
        $jam->update(Request()->all());
        return response()->json(['data'=>$jam]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jam $jam)
    {
        $jam->delete();
        return response()->json(['msg'=>"Data berhasil di hapus"]);
    }
}
