<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DetailPinjamBarang as Detail;
use App\PinjamBarang as Pinjam;

class ApiPeminjam extends Controller
{
    public function get_pinjaman(){
        $pinjam = Pinjam::all();
        $pinjaman = [];
        foreach($pinjam as $b){
            if($b->tgl_kembali != "0000-00-00"){
                $status = "Selesai";
            }else{
                if($b->pinjam == "ya"){
                    if($b->id_admin == "")
                        $status = "Dikirimkan";
                    else
                        $status = "Dipinjam";
                }else{
                    $status = "Draft";
                }
            }

            array_push($pinjaman, json_encode([
                "id"=>$b->id,
                "verify"=>$b->id_admin == null ? "":$b->admin->name,
                "tgl_pinjam"=>$b->tgl_pinjam,
                "tgl_kembali"=>$b->tgl_kembali,
                "status"=>$status
            ]));
        }
		return response()->json([
                      'error'   => 0,
                      'pinjaman' =>  $pinjaman,
                  ], 200);
    }
    public function detail_pinjaman($id){
        $detail = Detail::where("id_pinjaman", $id)->get();
        $details = [];
        foreach($detail as $b){
            array_push($details, json_encode([
                "kode"=>$b->barang->kode,
                "nama"=>$b->barang->nama,
                "spesifikasi"=>$b->barang->spesifikasi,
                "lokasi"=>$b->barang->lokasi,
                "kategori"=>$b->barang->kat->kategori,
                "jml_barang"=>$b->barang->jml_barang,
                "kondisi"=>$b->barang->kondisi,
                "sumber_dana"=>$b->barang->sumber_dana
            ]));
        }
		return response()->json([
                      'error'   => 0,
                      'details' =>  $details,
                  ], 200);
	}
}
