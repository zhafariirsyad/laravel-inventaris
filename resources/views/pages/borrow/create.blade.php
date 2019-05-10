@extends('templates.temp')

@section('title','Peminjaman')

@section('content')
	
	<form action="{{ route('borrow.store') }}" method="post">
		@csrf
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Peminjaman</h2>
	        </div>
	        @if(Auth::guard('web')->check())
				<div class="form-example-int">
		            <div class="form-group">
		                <label>Operator</label>
		                <div class="nk-int-st">
		                	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		                    <input type="text" class="form-control input-sm" readonly name="user" value="{{ Auth::user()->name }}">
		                </div>
		            </div>
		        </div>
	        @endif
	        @if(Auth::guard('web')->check())
				<div class="form-example-int">
		            <div class="form-group">
		                <label>Pegawai</label>
		                <div class="nk-int-st">
		                    <select name="employee_id" id="" class="form-control">
		                    	@foreach($employee as $field)
		                    		<option value="{{ $field->id }}">{{ $field->name }}</option>
		                    	@endforeach
		                    </select>
		                </div>
		            </div>
		        </div>
	        @endif
	        @if(Auth::guard('employee')->check())
				<div class="form-example-int">
		            <div class="form-group">
		                <label>Nama Pegawai</label>
		                <div class="nk-int-st">
		                	<input type="hidden" name="employee_id">
		                    <input type="text" class="form-control input-sm" name="employee" value="{{ Auth::guard('employee')->user()->name }}">
		                </div>
		            </div>
		        </div>
	        @endif
	        
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Lama Pinjam</label>
	                <div class="nk-int-st">
	                    <select name="long_borrow" id="" class="form-control">
	                    	<option value="3">3 Hari</option>
	                    	<option value="7">7 Hari</option>
	                    	<option value="14">14 Hari</option>
	                    	<option value="30">30 Hari</option>
	                    </select>
	                </div>
	            </div>
	        </div>

	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection