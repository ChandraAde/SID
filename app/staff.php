<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $guarded = ['id'];
    public $table = 'staff';

    public $timestamps = false;

    public function jadwal()
    {
    	return $this->hasMany('App\jadwal','id_staff');
    }
}
