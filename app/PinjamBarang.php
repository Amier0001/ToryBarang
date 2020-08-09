<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamBarang extends Model
{
    //
	public $table = "tb_pinjaman";
	public function admin(){
    	return $this->belongsTo('App\AdminOP','id_admin');
    }
	public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}