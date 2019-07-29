<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suratdetail extends Model
{
    
    protected $guarded = ['id'];
    public $table = 'surat';

    public $timestamps = false;

    public function surat(){
        return $this->hasMany(surat::class,'id_surat');
    }
}
