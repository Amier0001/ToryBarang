@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Barang Masuk</div>
				
                <div class="panel-body">	
                <table class="table table-striped">
                <thead>
                <th>ID Barang</th>
                	<th>Nama</th>
                	<th>Jumlah Barang</th>
                    <th>Barang Masuk</th>
                    <th>Lokasi Barang</th>
                </thead>
                	<tbody>
					<form action = "{{route('proc_pinjam')}}" method="POST">
					{{csrf_field()}}
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
                		</tr>
                	@endforeach
                	</tbody>
                </table>
				</form>
	<center>{{$data->links()}}</center>
		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
