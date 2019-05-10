@extends('templates.temp')

@section('title','Edit Barang')

@section('content')
	
	<form action="{{ route('item.update',$edit->id) }}" method="post">
		@csrf @method('patch')

		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Edit Barang</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama Barang</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name" value="{{ old('name',$edit->name) }}">
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
	                    		@if($types->id == $edit->type_id)
									<option value="{{ $types->id }}" selected>{{ $types->name }}</option>
								@else
									<option value="{{ $types->id }}">{{ $types->name }}</option>
								@endif
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
	                    		@if($rooms->id == $edit->room_id)
									<option value="{{ $rooms->id }}" selected>{{ $rooms->name }}</option>
								@else
									<option value="{{ $rooms->id }}">{{ $rooms->name }}</option>
								@endif	
	                    	@endforeach
	                    </select>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Total</label>
	                <div class="nk-int-st">
	                    <input type="text" name="total" class="form-control input-sm" value="{{ old('total',$edit->total) }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Keterangan</label>
	                <div class="nk-int-st">
	                    <textarea name="description" id="" cols="30" rows="5" class="form-control input-sm">{{ old('description',$edit->description) }}</textarea>
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <button class="btn btn-success notika-btn-success waves-effect">Simpan</button>
	        </div>
	    </div>
	</form>   

@endsection