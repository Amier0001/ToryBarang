@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Admin</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <center>
                <h4>Selamat Datang <b><i>{{ Auth::guard("admin")->user()->name }}</b></i> di Aplikasi Inventarori Barang SMK PGRI JATIBARANG!</h4>
                </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
