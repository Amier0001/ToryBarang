@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Data Barang</div>

                <div class="panel-body">	


                <a class="btn btn-primary" href="{{$page}}/create">Tambah Data</a>

                <div class="pull-right">
                    <form action="{{url($page.'/cari')}}" method="get">
                        <input type="text" name="q" class="form-control" placeholder="Cari Data">
                    </form>
                </div>
                <table class="table table-striped">
                <thead>
                <th>QR Code</th>
                	<th>Nama</th>
                	<th>Jumlah Barang</th>
                    <th>Barang Masuk</th>
                    <th>Lokasi Barang</th>
                    <th>Aksi</th>
                </thead>
                	<tbody>
                    @if (count($data) == 0)
                        {{-- expr --}}
                        <tr>
                            <td colspan="6"><center>Data Tidak Ada</center></td>
                        </tr>
                    @endif
                	@foreach ($data as $d)
                		<tr>
                			<td>{{$d->kode}}</td>
                			<td>{{$d->nama}}</td>
                            <td>{{$d->jml_barang}}</td>
                            <td>{{$d->created_at}}</td>
                            <td>{{$d->lokasi}}</td>
                            <td>

                            <a href="{{$page.'/'.$d->kode}}" class="btn btn-info">Detail</a>
                			<a href="{{$page.'/'.$d->kode.'/edit'}}" class="btn btn-success">Edit</a>
                                <button data-toggle="modal" data-target="#confirmModal" data-action="{{url($page.'/'.$d->kode)}}" class="btn btn-danger delete-btn">Hapus</button>
                			</td>
                		</tr>
                	@endforeach
                	</tbody>
                </table>
	<center>{{$data->links()}}</center>
		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
