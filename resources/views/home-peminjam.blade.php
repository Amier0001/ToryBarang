@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <center>
                <h4>Selamat Datang 
                    <b><i>{{ Auth::user()->name }}</i></b>
                 di Aplikasi Inventarori Barang SMK PGRI JATIBARANG!</h4>
                <h4>Status akun anda : <span style="color:red;font-weight:bold"><b>{{ucwords(Auth::guard("web")->user()->status)}}</b></h4></span>
                </center>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>NOTE:</b> Akun segera di aktifkan kurang dari 1x24 jam, jika dalam waktu tersebut status akun masih Belum Aktif, segera konfirmasi dibagian admin jurusan.</div>

                
            </div>
        </div>
    </div>
</div>
@endsection
