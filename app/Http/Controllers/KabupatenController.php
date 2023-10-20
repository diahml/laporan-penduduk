<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;
use App\Models\Provinsi;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('kabupaten.index',[
            'title' => 'Kabupaten',
            "active"=>"kabupaten",
            "kabupaten"=>kabupaten::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabupaten.create',[
            "active"=>'kabupaten',
            "title"=>'Kabupaten',
            "provinsi"=>Provinsi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKabupatenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKabupatenRequest $request)
    {
        $validatedData = $request->validate([
            'kabupaten'=>'required|max:255',
            'provinsi_id'=>'required',
         ]);
 
        Kabupaten::create($validatedData);
 
         return redirect('/kabupaten');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $kabupaten)
    {
        return view('kabupaten.edit',[
            "active"=>"provinsi",
            "title"=>"provinsi",
            "kabupaten"=>$kabupaten,
            "provinsi"=>Provinsi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKabupatenRequest  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKabupatenRequest $request, Kabupaten $kabupaten)
    {
        $rules = [
            'kabupaten'=>'required|max:255',
            'provinsi_id'=>'required',
         ];

         $validatedData=$request->validate($rules);

        Kabupaten::where('id', $kabupaten->id)
            ->update($validatedData);

        return redirect('/kabupaten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        Kabupaten::destroy($kabupaten->id);

        return redirect('/kabupaten');
    }
}
