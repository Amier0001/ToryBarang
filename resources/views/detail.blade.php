@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Pinjam Barang1</div>

                <div class="panel-body">	
				ID Pinjaman : {{$id}}
                <table class="table table-striped">
                <thead>
					<th>ID Barang</th>
                	<th>Nama</th>
                    <th>Lokasi Barang</th>
                    <th>Action</th>
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
                			<td>{{$d->barang->kode}}</td>
                			<td>{{$d->barang->nama}}</td>
                            <td>{{$d->barang->lokasi}}</td>
                            <td>@if($done == 0) <a href="/user/delete_detail_barang/{{$id}}/{{$d->barang->kode}}" class="btn btn-danger">Hapus</a>@else Selesai @endif</td>
                		</tr>
                	@endforeach
                	</tbody>
                </table>
				<form action = "{{route('send_pinjam')}}" method="POST">
				@if(Auth::check())
				{{csrf_field()}}
				<input type="hidden" name="id_pinjaman" value="{{$id}}">
				@if($done == 0)<input class="btn btn-info" type="submit" name="submit" value="Pinjam">
				<a href="/user/barang" class="btn btn-warning">Tambah Lagi</a>
				@endif
				<a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                @endif
				</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
