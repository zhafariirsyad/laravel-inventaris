@extends('templates.temp')

@section('title','Detail Peminjaman')

@section('content')
	<div class="form-example-wrap">
		<h4>Data Detail Peminjaman</h4>
		@if(session('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
	        </div>
		@endif
		<hr>
	</div>

	<div class="form-example-wrap">
		<a href="{{ route('borrow.index') }}" class="btn btn-success">Kembali</a>
		<br><br>
        <div class="table-responsive">
        	<table id="data-table-basic" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Barang</th>
        				<th>Total</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($data as $field)
						<tr>
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ $field->item->name }}</td>
							<td>{{ $field->total }}</td>
						</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>

@endsection