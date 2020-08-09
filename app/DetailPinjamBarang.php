<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamBarang extends Model
{
    public $table = "tb_detail_pinjam_barang";
	public function barang(){
    	return $this->belongsTo('App\Barang','id_barang');
    }
}
