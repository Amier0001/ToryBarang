@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Pinjaman Ku</div>
                <div class="panel-body">	
                <table class="table table-striped">
                <thead>
					<th>No</th>
                	<th>Verifikasi Oleh</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                	<tbody>
					@if (count($data) == 0)
                        {{-- expr --}}
                        <tr>
                            <td colspan="6"><center>Belum ada pinjaman</center></td>
                        </tr>
                    @endif
					@foreach ($data as $key=>$d)
                		<tr>
                			<td>{{++$key}}</td>
                            <td>@if ($d->id_admin != ""){{$d->admin->name}}@endif</td>
                            <td>{{$d->tgl_pinjam}}</td>
                            <td>{{$d->tgl_kembali}}</td>
                            <td>
							@if($d->tgl_kembali != "0000-00-00")
								Selesai
							@else
								{{$d->pinjam == "ya" ? "Dikirimkan":"Draft"}}
							@endif
							</td>
                            <td>
							@if($d->tgl_kembali != "0000-00-00")
								
							@else
                            <a href="{{$page.'/'.$d->id.'/edit'}}" class="btn btn-success">Edit</a>
                            <button data-toggle="modal" data-target="#confirmModal" data-action="{{url($page.'/'.$d->kode)}}" class="btn btn-danger delete-btn">Hapus</button>
                			@endif
							<a href="{{$page.'/'.$d->id}}" class="btn btn-info">Detail</a>
                			</td>
                		</tr>
                	@endforeach
                	</tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
