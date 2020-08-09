<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PinjamBarang as Obj;
use App\DetailPinjamBarang as Detail;
use Auth;

class PinjamBarangController extends Controller
{
    protected $page = 'pinjaman';
    protected $success = 'Data Berhasil';
    protected $failed = 'Data Gagal';
    protected $insert = 'Disimpan';
    protected $update = 'Diubah';
    protected $delete = 'Dihapus';




	public function __construct()
	{

		//$this->middleware('auth');
	}
	public function search(Request $request){
        $q = $request->q;
        $page=$this->page;
        if (empty($q)) {
            # code...
            return redirect('/'.$page);
        }
        $data = Obj::where('nama','LIKE','%'.$q.'%')->paginate(10);

        $no=1;
        return view($this->page.'/search',compact('data','no','page','q'));


    }

    public function index()
    {
        //
        $data = Obj::where('pinjam', 'ya')->paginate(10);
        $no=1;
        $page=$this->page;

		return view($page.'/index', compact('data','no','page'));
    }
	public function verify($id)
    {
		$ver = Obj::findOrFail($id);
		$ver->id_admin = Auth::guard("admin")->user()->id;
		$ver->tgl_pinjam = date("Y-m-d");
		$ver->save();
		return redirect("/admin/pinjaman")->with(["info"=>"Pinjaman diverifikasi"]);
    }
	public function kembali($id)
    {
		$ver = Obj::findOrFail($id);
		$ver->tgl_kembali = date("Y-m-d");
		$ver->save();
		return redirect("/admin/pinjaman")->with(["info"=>"Pinjaman Selesai"]);
    }
	public function detail_pinjam($id)
    {
		$done = Obj::where("id", $id)->where("tgl_kembali", "!=", "0000-00-00")->count() > 0 ? 1:0;
		$data = Detail::where("id_pinjaman", $id)->get();
        return view('detail', compact('data', 'id', 'done'));
    }
}
