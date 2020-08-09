<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lokasi;
use Session;

class LokasiController extends Controller
{

	protected $page = 'lokasi';
    protected $success = 'Data Berhasil';
    protected $failed = 'Data Gagal';
    protected $insert = 'Disimpan';
    protected $update = 'Diubah';
    protected $delete = 'Dihapus';
    public function index()
    {
    	// mengambil data pegawai
    	$lokasi = Lokasi::all();
 
    	// mengirim data pegawai ke view pegawai
    	return view('lokasi', ['lokasi' => $lokasi]);
    }

    public function create()
    {
        //
        $page = $this->page;
        return view($this->page.'/create',compact('page'));
    }

    public function store(Request $request)
    {
        //
        $obj = new Obj;
        $obj->lokasi = $request->lokasi;
        $save = $obj->save();
        if ($save) {
            # code...
            Session::flash('success',$this->success.$this->insert);
        }

        return redirect('/'.$this->page);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $data= Obj::find($id);
        $page = $this->page;
        return view($this->page.'/edit',compact('data','page'));
    }

    public function update(Request $request, $id)
    {
        //
        $obj = Obj::find($id);
        $obj->lokasi = $request->lokasi;
        $obj->save();


        return redirect('/'.$this->page);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obj = Obj::find($id);
        $obj->delete();
        // Session::flash('success',);
        return redirect('/'.$this->page);
    }


    public function search(Request $request){
        $q = $request->q;
        $page=$this->page;
        if (empty($q)) {
            # code...
            return redirect('/'.$page);
        }
        $data = Obj::where('lokasi','LIKE','%'.$q.'%')->paginate(10);

        $no=1;
        return view($this->page.'/search',compact('data','no','page','q'));


    }

}
