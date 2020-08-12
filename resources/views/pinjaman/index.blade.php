@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Data Pinjaman</div>
                <div class="panel-body">	
                <table class="table table-striped">
                <thead>
					<th>No</th>
                	<th>Nama</th>
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
                			<td>{{$d->user->name}}</td>
                            <td>@if ($d->id_admin != ""){{$d->admin->name}}@endif</td>
                            <td>{{$d->tgl_pinjam}}</td>
                            <td>{{$d->tgl_kembali}}</td>
							<td>
							@if($d->tgl_kembali != "0000-00-00")
								<label class="label label-success">Selesai</label>
							@else
								@if($d->pinjam == "ya")
									@if($d->id_admin == "")	
										<label class="label label-warning">Dikirimkan</label>
									@else
										<label class="label label-primary">Dipinjam</label>
									@endif
								@endif
							@endif
							</td>
                            <td>
							<a href="{{'/admin/'.$page.'/'.$d->id.'/detail'}}" class="btn btn-info">Detail</a>
                			@if($d->id_admin == null)
                            <a href="{{$page.'/'.$d->id.'/verify'}}" class="btn btn-warning">Verifikasi</a>
                            @elseif($d->tgl_kembali == "0000-00-00")
							<a href="{{$page.'/'.$d->id.'/kembali'}}" class="btn btn-success">Kembalikan</a>
                            @endif
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
