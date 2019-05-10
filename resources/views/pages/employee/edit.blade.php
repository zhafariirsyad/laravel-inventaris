@extends('templates.temp')

@section('title','Edit Pegawai')

@section('content')
	
	<form action="{{ route('employee.update',$edit->id) }}" method="post">
		@csrf @method('patch')
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Edit Pegawai</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>NIP</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="nip" value="{{ old('nip',$edit->nip) }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama Pegawai</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name" value="{{ old('name',$edit->name) }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Alamat</label>
	                <div class="nk-int-st">
	                    <textarea class="form-control input-sm" name="address">{{ old('address',$edit->address) }}</textarea>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection