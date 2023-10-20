<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\Provinsi;
use App\Models\Kabupaten;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('index',[
            "active"=>"home",
            "title"=>"Home",
            "penduduk"=>Penduduk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getKabupaten($provinsi_id)
    {
        $kabupaten = Kabupaten::where('provinsi_id', $provinsi_id)->get();
        return response()->json($kabupaten);
    }


    public function create()
    {
        return view('create',[
            "active"=>'home',
            "title"=>'Home',
            "provinsi"=>Provinsi::all(),
            "kabupaten"=>Kabupaten::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendudukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendudukRequest  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
