@extends('templates.temp')

@section('title','Tambah Barang')

@section('content')
	
	<form action="{{ route('item.store') }}" method="post">
		@csrf 
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Tambah Barang</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama Barang</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Tipe</label>
	                <div class="nk-int-st">
	                    <select name="type_id" id="" class="form-control">
	                    	<option value="">Pilih Tipe</option>
	                    	@foreach($type as $types)
								<option value="{{ $types->id }}">{{ $types->name }}</option>
	                    	@endforeach
	                    </select>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Ruangan</label>
	                <div class="nk-int-st">
	                    <select name="room_id" id="" class="form-control">
	                    	<option value="">Pilih Ruangan</option>
	                    	@foreach($room as $rooms)
								<option value="{{ $rooms->id }}">{{ $rooms->name }}</option>
	                    	@endforeach
	                    </select>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Total</label>
	                <div class="nk-int-st">
	                    <input type="text" name="total" class="form-control input-sm">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Keterangan</label>
	                <div class="nk-int-st">
	                    <textarea name="description" id="" cols="30" rows="5" class="form-control input-sm"></textarea>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection