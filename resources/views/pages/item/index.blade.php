@extends('templates.temp')

@section('title','Item')

@section('content')
	<div class="form-example-wrap">
		<h4>Data Barang</h4>
		@if(session('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
	        </div>
		@endif
		<hr>
	</div>

	<div class="form-example-wrap">
		<a href="{{ route('item.create') }}" class="btn btn-success">Tambah Data</a>
		<br><br>
        <div class="table-responsive">
        	<table id="data-table-basic" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Nama</th>
        				{{-- <th>Ruangan</th> --}}
        				{{-- <th>Tipe</th> --}}
        				{{-- <th>Penginput</th> --}}
        				<th>Total</th>
        				{{-- <th>Keterangan</th> --}}
        				<th>Tanggal Input</th>
        				<th>Aksi</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($data as $datas)
	        			<tr>
	        				<td>{{ $loop->index + 1 }}</td>
	        				<td>{{ $datas->name }}</td>
	        				{{-- <td>{{ $datas->room->name }}</td> --}}
	        				{{-- <td>{{ $datas->type->name }}</td> --}}
	        				{{-- <td>{{ $datas->user->name }}</td> --}}
	        				<td>{{ $datas->total }}</td>
	        				{{-- <td>{{ $datas->description }}</td> --}}
	        				<td>{{ $datas->register_date }}</td>
	        				<td>
	        					<div class="btn-group">
	        						<a href="{{ route('item.edit',$datas) }}" class="btn btn-sm btn-warning"><span class="notika-icon notika-edit"></span></a>
	        						<a href="{{ route('item.destroy',$datas) }}" class="btn btn-sm btn-danger btn-delete"><span class="notika-icon notika-trash"></span></a>
	        						<a href="{{ route('item.show',$datas) }}" class="btn btn-info btn-sm"><span class="notika-icon notika-eye"></span></a>
	        						<a href="{{ route('supply',$datas) }}" class="btn btn-success btn-sm">Pasok</a>
	        					</div>
	        				</td>
	        			</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>

@endsection