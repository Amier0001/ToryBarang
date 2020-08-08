@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Lokasi</div>

                <div class="panel-body">	
                    <form action="{{ url($page.'/'.$data->id) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                       
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="Lokasi" class="form-control" value="{{$data->lokasi}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
