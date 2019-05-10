@extends('templates.temp')

@section('title','Peminjaman')

@section('content')
<br>
	<div class="form-example-wrap">
		<div class="row">
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<div class="col-md-6">
				<form action="{{ route('borrow_detail.store') }}" method="post">
					@csrf
					<h4>Form Peminjaman</h4><hr>
					<div class="form-group">
						<label for="">Peminjam</label>
						<input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
						<input type="text" name="borrower" class="form-control" value="{{ $borrow->employee->name }}">
					</div>
					<div class="form-group">
						<label for="">Barang</label>
						<select name="item_id" id="" class="form-control">
							@foreach($item as $items)
								<option value="{{ $items->id }}">{{ $items->name }} : {{ $items->total }}</option>
							@endforeach	
						</select>
					</div>
					<div class="form-group">
						<label for="">Total</label>
						<input type="text" name="total" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-success btn-block">Simpan</button>
					</div>
				</form>	
				<br>
				@if(session('message'))
					<div class="alert alert-success alert-dismissible" role="alert">
			            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> {{ session('message') }}
			        </div>
	        	@endif
			</div>	
			<div class="col-md-6">
				<div class="form-group">
					<h4 align="center">Data Peminjaman</h4>
				</div>
				<div class="form-group">
					<div class="table-responsive">
			        	<table id="data-table-basic" class="table table-striped">
			        		<thead>
			        			<tr>
			        				<th>No</th>
			        				<th>Barang</th>
			        				<th>Total</th>
			        				<th>Aksi</th>
			        			</tr>	
			        		</thead>
			        		<tbody>
			        			@foreach($borrow->detail_borrow as $field)
				        			<tr>
				        				<td>{{ $loop->index + 1 }}</td>
				        				<td>{{ $field->item->name }}</td>
				        				<td>{{ $field->total }}</td>
				        				<td>
				        					<a href="{{ route('borrow_detail.destroy',$field) }}" class="btn btn-danger btn-delete">Cancel</a>
				        				</td>
				        			</tr>
			        			@endforeach
			        		</tbody>
			        	</table>
			        	<form action="{{ route('borrow.update',$borrow) }}" method="post">
			        		@csrf @method('patch')
							<br>
			        		<button class="btn btn-success btn-block">Selesai</button>
			        	</form>
			        </div>			
				</div>
			</div>
		</div>	
		</div>
	</div>

@endsection