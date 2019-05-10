@extends('templates.temp')

@section('title','Pengembalian')

@section('content')
	<div class="form-example-wrap">
		<h4>Form Pengembalian</h4>
		@if(session('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
	        </div>
		@endif
		<hr>
	</div>

	<div class="form-example-wrap">
        <div class="table-responsive">
        	<form action="{{ route('borrow_detail.update',$borrow) }}" method="post">
        		@csrf @method('patch')
        		
        	<input type="hidden" value="{{ $borrow->id }}" name="borrow_id">

        	<table id="" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Nama Barang</th>
        				<th>Total</th>
        				<th>Total Barang Rusak</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($borrow->detail_borrow as $data)
	        			<tr>
	        				<td>{{ $loop->index + 1 }}</td>
	        				<td>{{ $data->item->name }}</td>
	        				<input type="hidden" name="id_item[]" value="{{ $data->item_id }}">
	        				<input type="hidden" name="total[]" value="{{ $data->total }}">
	        				<td>{{ $data->total }}</td>
	        				<td><input type="text" name="total_broken[]" value="0" class="form-control"></td>
	        			</tr>
	        		@endforeach	
        		</tbody>
        	</table>
        	
        		<button class="btn btn-success btn-block">Selesai</button>
        	</form>
        </div>
    </div>

@endsection