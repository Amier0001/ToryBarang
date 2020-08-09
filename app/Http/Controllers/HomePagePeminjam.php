<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PinjamBarang as Pinjam;
use App\DetailPinjamBarang as Detail;
use Auth;
use App\Barang;

class HomePagePeminjam extends Controller
{
    public function __construct()
    {
        $this->middleware('peminjam');
    }
	public function index()
    {
        return view('home-peminjam');
    }
	public function pinjaman()
    {
		$page = "/user/detail_pinjam";
		$data = Pinjam::where('id_user', Auth::user()->id)->paginate(10);
        return view('pinjamanku', compact('data', 'page'));
    }
	public function barang()
    {
		$data = Barang::paginate(10);
        return view('barang', compact('data'));
    }
	
	public function proc_pinjam(Request $request)
    {
		if(isset($request->barang))
		if(Auth::user()->status == "aktif"){
			$cek = Pinjam::where("id_user", Auth::user()->id)->where("pinjam", "tidak");
			$n=0;
			$ida = 0;
			if($cek->count() > 0){
				$ida = $cek->first()->id;
				foreach($request->barang as $id_barang){
					if(Detail::where("id_pinjaman", $cek->first()->id)->where("id_barang", $id_barang)->count() == 0){
						$detail = new Detail;
						$detail->id_pinjaman = $cek->first()->id;
						$detail->id_barang = $id_barang;
						if($detail->save()) $n++;
					}				
				}
			}else{
				$pinjaman = new Pinjam;
				$pinjaman->id_user = Auth::user()->id;
				$pinjaman->pinjam = "tidak";
				if($pinjaman->save()){
					$ida = $pinjaman->id;
					foreach($request->barang as $id_barang){
						if(Detail::where("id_pinjaman", $pinjaman->id)->where("id_barang", $id_barang)->count() == 0){
							$detail = new Detail;
							$detail->id_pinjaman = $pinjaman->id;
							$detail->id_barang = $id_barang;
							if($detail->save()) $n++;	
						}			
					}
				}
				
			}
			$msg = $n." Barang berhasil ditambahkan.";
			if($n == 0) $msg = "Tidak ada Barang yang ditambahkan.";
			return redirect('/user/detail_pinjam/'.$ida)->with(["info"=>$msg]);
		}else{
			return redirect(url()->previous())->with(["error"=>"Tdak dapat meminjam, Akun anda belum aktif"]);
		}
		return redirect(url()->previous())->with(["error"=>"Tdak dapat meminjam, Terjadi kesalahan"]);
    }
	
	public function detail_pinjam($id)
    {
		$done = Pinjam::where("id", $id)->where("tgl_kembali", "!=", "0000-00-00")->count() > 0 ? 1:0;
		$data = Detail::where("id_pinjaman", $id)->get();
        return view('detail', compact('data', 'id', 'done'));
    }
	public function delete_detail_barang($ida,$idb)
    {
		Detail::where("id_pinjaman", $ida)->where("id_barang", $idb)->delete();
        return redirect("/user/detail_pinjam/".$ida)->with(["info"=>"Barang Berhasil dihapus!"]);
    }
	public function send_pinjam(Request $request)
    {
		$msg = "Tidak dapat mengirimkan pengajuan pinjaman";
		$tp = "error";
		$send = Pinjam::findOrFail($request->id_pinjaman);
		$send->pinjam = "ya";
		if($send->update()){$msg = "Berhasil mengirimkan pengajuan pinjaman";$tp = "info";}
		return redirect("/pinjaman")->with([$tp=>$msg]);
    }
}
