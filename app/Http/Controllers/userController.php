<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
use DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table("staff")->get();
        return view('user',compact ("data")) ;
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
        $data = staff::create([
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->JK,
            'jabatan'=>$request->jabatan,
            'No_Hp'=>$request->No_Telp,
            'alamat'=>$request->Alamat,
            
        ]);

        return redirect()->route('user.index');
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


    public function edit($id)
    {
        $data = staff::all()->where('id', $id);
        return view('Edit.editstaff', compact('data'));
    }


    public function update(Request $request, $id)
    {
        DB::table('staff')->where('id', $request->id)->update([
           'nama'=>$request->nama,
           'jenis_kelamin'=>$request->JK,
           'jabatan'=>$request->jabatan,
           'No_Hp'=>$request->No_Telp,
           'alamat'=>$request->Alamat,
       ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          DB::table('staff')->where('id', $id)->delete();
        return redirect('user');
    }
}
