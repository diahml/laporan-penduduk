<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Carbon\Carbon;

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
            "provinsi"=>Provinsi::all(),
            "kabupaten"=>Kabupaten::all(),
        ]);
        $penduduk = Penduduk::all();
        foreach($penduduk as $penduduk){
            $alamatArray = explode(', ', $penduduk->alamat);
            $penduduk->kabupaten = $alamatArray[1]; // Misalkan kabupaten berada di indeks pertama
            $penduduk->provinsi = $alamatArray[2];
        }
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
        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'nik'=>'required|max:18',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|max:255',
            'kabupaten_id'=>'required',
         ]);
         $validatedData['tgl_lahir']=Carbon::parse($request['tgl_lahir'])->format('Y-m-d');
 
        Penduduk::create($validatedData);
 
         return redirect('/');
    }

    public function exportPenduduk()
    {
        return view('export', [
            'title' => 'Home',
            'active' => 'home',
            'penduduk' => Penduduk::all(),
            'provinsi' => Provinsi::all(),
            'kabupaten' => Kabupaten::all(),
        ]);
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

    public function edit($id)
    {
        $penduduk = Penduduk::select('*')->where('id', $id)->get();
        return view(
            'edit',
            [
                'title' => 'Home',
                'active' =>'home',
                'penduduk' => $penduduk,
                'provinsi'=>Provinsi::all(),
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendudukRequest  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendudukRequest $request, $id)
    {
        $rules = [
            'nama'=>'required|max:255',
            'nik'=>'required|max:18',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|max:255',
            'kabupaten_id'=>'required',
        ];

        $validatedData = $request->validate($rules);
        Penduduk::where('id', $id)
            ->update($validatedData);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk, $id)
    {
        
        Kabupaten::destroy($penduduk->$id);

        return redirect('/');
    }
}
