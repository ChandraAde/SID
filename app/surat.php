<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    protected $guarded = ['id'];
    public $table = 'permohonan_surat';

    public $timestamps = false;

    public function warga(){
        return $this->belongsTo(warga::class,'id_warga');
    }

    public function surDet(){
        return $this->belongsTo(suratdetail::class,'id_surat');
    }
}
