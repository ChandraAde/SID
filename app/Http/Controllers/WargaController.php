<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warga;
use DB;


class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table("warga")->get();
        return view('warga', compact("data"));
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

    public function ubah()
    {

        $data = DB::table("warga")->get();
        return view('modal.editwarga', compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->ttl,
            'jenis_kelamin' => $request->JK,
            'no_hp' => $request->No_Telp,
            'alamat' => $request->Alamat,
        ]);

        return redirect()->route('warga.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga = DB::table('warga')->where('id', $id)->get();
        return view('Edit.editwarga', ['warga' => $warga]);
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
        DB::table('warga')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->ttl,
            'jenis_kelamin' => $request->JK,
            'no_hp' => $request->No_Telp,
            'alamat' => $request->Alamat,

        ]);
         return redirect()->route('warga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('warga')->where('id', $id)->delete();
        return redirect('warga');
    }

    public function validasi(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric|min:5|max:20',
            'nama' => 'required|max:225',
            'ttl' => 'required',
            'No_Telp' => 'required|min:2|Max:12',
            'Alamat' => 'required',

        ]);
    }
}
