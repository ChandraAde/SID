<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
use App\jadwal;
use DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data2 = staff::all();
     $data = jadwal::all();
     return view('jadwal', compact("data", "data2"));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = jadwal::create([
            'id_staff' => $request->moderator,
            'kegiatan' => $request->kegiatan,
            'tempat' => $request->tempat,
            'hari' => $request->hari,
            'jam_mulai' => $request->Jam_Mulai,
            'jam_selesai' => $request->Jam_Selesai,
        ]);

        return redirect()->route('jadwal.index');
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

        $data45 = staff::all();
        $jadwal = jadwal::all()->where('id', $id);
        return view('Edit.editjadwal', compact("data45", 'jadwal'));
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
      DB::table('jadwal_kegiatan')->where('id',$request->$id)->update([

       'id_staff' =>$request->moderatot,
       'kegiatan' =>$request->kegiatan,
       'tempat' =>$request->tempat,
       'hari' =>$request->hari,
       'jam_mulai' =>$request->Jam_Mulai,
       'jam_selesai' =>$request->Jam_Selesai,
   ]);
      return redirect()->route('jadwal.index');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jadwal_kegiatan')->where('id', $id)->delete();
        return redirect('jadwal');
    }
}
