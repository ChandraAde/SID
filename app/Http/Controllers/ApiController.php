<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwal;
use App\warga;
use App\surat;
use App\staff;
use App\suratdetail;

class ApiController extends Controller
{
     public function getJadwal(){

    	$data = jadwal::with('staf')->get();
    	return $data;
    	
    }
    public function getWarga(){

    	$data = warga::all();
    	return $data;
    	
    }
    public function getSurat(){
  
    	$data = surat::with('warga','surDet')->get();
    	return $data;
    	
    } 
    public function getSuratdet(){
  
        $data = suratdetail::all();
        return $data;
        
    }
    public function getStaff(){

    	$data = staff::all();
    	return $data;
    	
    }
    public function postStaff(Request $request){
    	$save = staff::create($request->all());
    	if ($save) {
    		$res = array(
    			'status' =>true,
    			'message' =>'berhasil disimpan'
    		);
    	}else{
    		$res = array(
    			'status' => false,
    			'message' => 'gagal disimpan'
    		);
    	}
    	return response()->json($res);
    }
    public function postSurat(Request $request){
    	$save = surat::create($request->all());
    	if ($save) {
    		$res = array(
    			'status' =>true,
    			'message' =>'berhasil disimpan'
    		);
    	}else{
    		$res = array(
    			'status' => false,
    			'message' => 'gagal disimpan'
    		);
    	}
    	return response()->json($res);
    }
    public function postJadwal(Request $request){
    	$save = jadwal::create($request->all());
    	if ($save) {
    		$res = array(
    			'status' =>true,
    			'message' =>'berhasil disimpan'
    		);
    	}else{
    		$res = array(
    			'status' => false,
    			'message' => 'gagal disimpan'
    		);
    	}
    	return response()->json($res);
    }
    public function postWarga(Request $request){
    	$save = warga::create($request->all());
    	if ($save) {
    		$res = array(
    			'status' =>true,
    			'message' =>'berhasil disimpan'
    		);
    	}else{
    		$res = array(
    			'status' => false,
    			'message' => 'gagal disimpan'
    		);
    	}
    	return response()->json($res);
    }
    public function updateWarga($id, Request $request){
    	$save = warga::where('id', $id)->update($request->all());
    	if ($save) {
    		$res = array(
    			'status' =>true,
    			'message' =>'berhasil di ubah'
    		);
    	}else{
    		$res = array(
    			'status' => false,						
    			'message' => 'gagal di ubah'
    		);
    	}
    	return response()->json($res);
    }
    
    
}
