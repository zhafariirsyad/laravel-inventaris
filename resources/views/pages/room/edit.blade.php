@extends('templates.temp')

@section('title','Tambah Ruangan')

@section('content')
	
	<form action="{{ route('room.store',$edit->id) }}" method="post">
		@csrf
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Edit Ruangan</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama Ruangan</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name" value="{{ $edit->name }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Keterangan</label>
	                <div class="nk-int-st">
	                    <textarea class="form-control input-sm" name="description">{{ $edit->description }}</textarea>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection