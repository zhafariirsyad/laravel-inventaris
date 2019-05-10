@extends('templates.temp')

@section('title','Edit User')

@section('content')
	
	<form action="{{ route('user.update',$edit) }}" method="post">
		@csrf @method('patch')
		<div class="form-example-wrap">
	        <div class="cmp-tb-hd">
	            <h2>Form Edit User</h2>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Email</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="email" value="{{ $edit->email }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Nama User</label>
	                <div class="nk-int-st">
	                    <input type="text" class="form-control input-sm" name="name" value="{{ $edit->name }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int mg-t-15">
	            <div class="form-group">
	                <label>Password</label>
	                <div class="nk-int-st">
	                    <input type="password" name="password" id="" class="form-control" value="{{ $edit->password }}">
	                </div>
	            </div>
	        </div>
	        <div class="form-example-int">
	            <div class="form-group">
	                <label>Sebagai</label>
	                <div class="nk-int-st">
						<select name="level_id" id="" class="form-control">
	                    	@foreach($levels as $level)
	                    		@if($level->id == $edit->level_id)
									<option value="{{ $level->id }}" selected>{{ $level->name }}</option>
								@else
									<option value="{{ $level->id }}">{{ $level->name }}</option>
								@endif	
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