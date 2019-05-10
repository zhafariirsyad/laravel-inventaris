@extends('templates.temp')

@section('title','Tambah Pegawai')

@section('content')
	
	<form action="{{ route('employee.store') }}" method="post">
		@csrf
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Tambah Pegawai</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>NIP</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="nip">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama Pegawai</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Alamat</label>
	                <div class="nk-int-st">
	                    <textarea class="form-control input-sm" name="address"></textarea>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection