<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;

class ProvinsiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('provinsi.index',[
            'title' => 'Provinsi',
            "active"=>"provinsi",
            "provinsi"=>provinsi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create',[
            "active"=>'provinsi',
            "title"=>'Provinsi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProvinsiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvinsiRequest $request)
    {
        
        $validatedData = $request->validate([
            'provinsi'=>'required|max:255',
         ]);
 
        Provinsi::create($validatedData);
 
         return redirect('/provinsi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        return view('provinsi.edit',[
            "active"=>"provinsi",
            "title"=>"provinsi",
            "provinsi"=>$provinsi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProvinsiRequest  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvinsiRequest $request, Provinsi $provinsi)
    {
        $rules = [
            'provinsi'=>'required|max:255',
         ];

         $validatedData=$request->validate($rules);

        Provinsi::where('id', $provinsi->id)
            ->update($validatedData);

        return redirect('/provinsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        Provinsi::destroy($provinsi->id);

        return redirect('/provinsi');
    }
}
