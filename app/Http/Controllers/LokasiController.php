<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\lokasi;

class LokasiController extends Controller
{
     public function tambah(Request $request){
  $tambah = new lokasi;
  $tambah->nama_lokasi = $request->nama_lokasi;
  $tambah->save();
 }
}
