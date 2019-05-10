@extends('templates.temp')

@section('title','Barang Rusak')

@section('content')
	<div class="form-example-wrap">
		<h4>Data Barang Rusak</h4>
		@if(session('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
	        </div>
		@endif
		<hr>
	</div>

	<div class="form-example-wrap">
        <div class="table-responsive">
        	<table id="data-table-basic" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Barang</th>
        				<th>Total</th>
        				<th>Tanggal Rusak</th>
        				<th>Tanggal Diperbaiki</th>
        				<th>Aksi</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($data as $datas)
	        			<tr>
	        				<td>{{ $loop->index + 1 }}</td>
	        				<td>{{ $datas->item->name }}</td>
	        				<td>{{ $datas->total }}</td>
	        				<td>{{ substr($datas->broken_date,0,16) }}</td>
	        				<td>
	        					@if($datas->fix_date == (null))
	        						<h5 align="center">-</h5>
	        					@else
	        						{{ substr($datas->fix_date,0,16) }}
	        					@endif
	        				</td>
	        				<td>
	        					@if($datas->fix_date == (null))
									<form action="{{ route('broken_item.update',$datas) }}" method="post">
										@csrf @method('patch')

										<button class="btn btn-info btn-sm">Perbaiki</button>
									</form>
								@else
									<label for="">No Action</label>
	        					@endif
	        				</td>
	        			</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>

@endsection