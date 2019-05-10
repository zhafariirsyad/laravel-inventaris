@extends('templates.temp')

@section('title','Peminjaman')

@section('content')
	<div class="form-example-wrap">
		<h4>Data Peminjaman</h4>
		@if(session('message'))
			<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
	        </div>
		@endif
		<hr>
	</div>

	<div class="form-example-wrap">
		
		<a href="{{ route('borrow.create') }}" class="btn btn-success">Tambah Data</a>
		
		<br><br>
        <div class="table-responsive">
        	<table id="data-table-basic" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Pegawai</th>
        				<th>Tgl Pinjam</th>
        				<th>Tgl Kembali</th>
        				<th>Petugas</th>
        				<th>Status</th>
        				@if(Auth::guard('web')->check())
        					<th>Aksi</th>
        				@endif
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($data as $field)
	        			<tr>
	        				<td>{{ $loop->index + 1 }}</td>
	        				<td>{{ $field->employee->name }}</td>
	        				<td>{{ substr($field->borrow_date,0,16) }}</td>
	        				<td>{{ substr($field->return_date,0,16) }}</td>
	        				@if($field->user_id == (null))
								<td><h5 align="center">-</h5></td>	
	        				@else
	        					<td>{{ $field->user->name }}</td>
	        				@endif
	        				<td>{{ $field->status }}</td>
	        				@if(Auth::guard('web')->check())
		        				<td>
		        					<div class="btn-group">
		        						@if($field->status == "uncomplete")	
											<a href="{{ route('borrow.show',$field) }}" class="btn btn-sm btn-warning">Lanjut</a>
		        						@elseif($field->status == "borrowed")
											<a href="{{ route('borrow_detail.show',$field) }}" class="btn btn-success btn-sm">Return</a>
		        						@elseif($field->status == "booked")
											<form action="{{ route('borrow.destroy',$field) }}" method="post">
												@csrf @method('delete')
												<button class="btn btn-sm btn-warning" name="approve" value="1">Approve</button>
											</form>
											<form action="{{ route('borrow.destroy',$field) }}" method="post">
												@csrf @method('delete')
												<button class="btn btn-sm btn-warning" name="approve" value="0">Deny</button>
											</form>
		        						@endif
		        						<a href="{{ route('detail',$field) }}" class="btn btn-sm btn-info">Detail</a>
		        					</div>
		        				</td>
		        			@endif	
	        			</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>

@endsection