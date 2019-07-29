<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warga extends Model
{
    protected $guarded = ['id'];
    public $table = 'warga';

    public $timestamps = false;

    public function surat(){
        return $this->hasMany(surat::class,'id_warga');
    }
    
}
