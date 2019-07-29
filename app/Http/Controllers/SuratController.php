<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surat;
use App\warga;
use App\suratdetail;
use DB;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data3 = suratdetail::all();
        $data2 = warga::all();
        $data = surat::all();
        return view('surat', compact("data", "data2", "data3"));
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
        $data = surat::create([
            'id_warga' => $request->Nama,
            'id_surat' => $request->surat_permohonan,
        ]);

        return redirect()->route('surat.index');
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
        $surat = surat::all()->where('id_permohonan', $id);
        $data3 = suratdetail::all();
        $data2 = warga::all();
        return view('Edit.editsurat', compact("surat", "data2", "data3"));
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
        DB::table('permohonan_surat')->where('id_permohonan', $request->id)->update([

            'id_warga' => $request->Nama,
            'id_surat' => $request->surat_permohonan,
        ]);

         return redirect()->route('surat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('permohonan_surat')->where('id_permohonan', $id)->delete();
        return redirect('surat');
    }
}
