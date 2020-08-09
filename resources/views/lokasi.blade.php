@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lokasi Barang Teknik komputer Jaringan
                    <a class="btn btn-primary col-md-offset-5" href="../create">Tambah Lokasi</a>
                </div>



                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<ul>
						@foreach($lokasi as $p)
							<li>{{ "Lokasi Barang: ". $p->nama}}</li>
						@endforeach
					</ul>



				</div>
            </div>
        </div>
    </div>
</div>
@endsection
