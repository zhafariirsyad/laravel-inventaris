@extends('templates.temp')

@section('title','Room')

@section('content')
	<div class="form-example-wrap">
		<h4>Data Ruangan</h4>
		@if(session('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
	        </div>
		@endif
		<hr>
	</div>

	<div class="form-example-wrap">
		<a href="{{ route('room.create') }}" class="btn btn-success">Tambah Data</a>
		<br><br>
        <div class="table-responsive">
        	<table id="data-table-basic" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Name</th>
        				<th>Keterangan</th>
        				<th>Aksi</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($data as $datas)
	        			<tr>
	        				<td>{{ $loop->index + 1 }}</td>
	        				<td>{{ $datas->name }}</td>
	        				<td>{{ $datas->description }}</td>
	        				<td>
	        					<div class="btn-group">
	        						<a href="{{ route('room.edit',$datas) }}" class="btn btn-sm btn-warning"><span class="notika-icon notika-edit"></span></a>
	        						<a href="{{ route('room.destroy',$datas) }}" class="btn btn-sm btn-danger btn-delete"><span class="notika-icon notika-trash"></span></a>
	        					</div>
	        				</td>
	        			</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>

@endsection