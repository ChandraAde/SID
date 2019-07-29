<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $guarded = ['id'];
    public $table = 'jadwal_kegiatan';
    

    public $timestamps = false;

   public function staf(){
       return $this->belongsTo(staff::class,'id_staff');
   }
}
