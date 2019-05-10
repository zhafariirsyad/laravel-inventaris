@extends('templates.temp')

@section('title','Edit Tipe')

@section('content')

	<form action="{{ route('type.update',$edit->id) }}" method="post">
		@csrf @method('patch')
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Edit Tipe</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama Tipe</label>
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