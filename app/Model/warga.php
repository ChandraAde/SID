<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class warga extends Model
{
	protected $guarded = ['id'];
    public $table = 'warga';

    public $fillable = [
    	'nama',
    	'qty',
    	'harga_beli',
    	'harga_jual',
    	'id_kategori'
    ];

    public $timestamps = false;

    public function kategori()
    {
    	return $this->belongsTo('App\Model\kategori', 'id_kategori');
    }
}