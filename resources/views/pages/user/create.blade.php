@extends('templates.temp')

@section('title','Tambah User')

@section('content')
	
	<form action="{{ route('user.store') }}" method="post">
		@csrf
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Tambah User</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Email</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="email">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama User</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Password</label>
	                <div class="nk-int-st">
	                    <input type="password" name="password" id="" class="form-control">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Sebagai</label>
	                <div class="nk-int-st">
						<select name="level_id" id="" class="form-control">
	                    	@foreach($levels as $level)
								<option value="{{ $level->id }}">{{ $level->name }}</option>
							@endforeach
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