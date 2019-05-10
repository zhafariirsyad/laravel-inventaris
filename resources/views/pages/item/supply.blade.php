@extends('templates.temp')

@section('title','Pasok')

@section('content')
	
	<form action="{{ route('supply.store') }}" method="post">
		@csrf
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Pasok</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Barang</label>
	                <div class="nk-int-st">
	                	<input type="hidden" name="item_id" value="{{ $item->id }}">
	                    <input type="text" class="form-control input-sm" name="name" value="{{ $item->name }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Total</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="total" value="0">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection