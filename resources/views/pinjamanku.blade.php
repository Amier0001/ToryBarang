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
								<label class="label label-success">Selesai</label>
							@else
								@if($d->pinjam == "ya")
									@if($d->id_admin == "")	
										<label class="label label-warning">Dikirimkan</label>
									@else
										<label class="label label-primary">Dipinjam</label>
									@endif
								@else
									<label class="label label-default">Draft</label>
								@endif
							@endif
							</td>
                            <td>
							<form action = "{{route('send_pinjam')}}" method="POST">
							{{csrf_field()}}
							<a href="{{$page.'/'.$d->id}}" class="btn btn-info">Detail</a>
							<input type="hidden" name="id_pinjaman" value="{{$d->id}}">
							@if($d->tgl_kembali == "0000-00-00")@if($d->pinjam != "ya")<input class="btn btn-primary" type="submit" name="submit" value="Pinjam">
							@endif @endif
							</form>
							
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
