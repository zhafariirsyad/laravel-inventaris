@extends('templates.temp')

@section('title','Laporan')

@section('content')
	<div class="form-example-wrap">
        <form action="{{ route('report.load') }}" method="post">
            @csrf
		<h4>Pilih Ruangan</h4>
		<br><br>
        <select name="room_id" id="" class="form-control">
            @foreach($room as $rooms)
                <option value="{{ $rooms->id }}">{{ $rooms->name }}</option>
            @endforeach()
        </select>    
        <br>
        
        <button class="btn btn-info" target="_blank">Lihat</button>
        </form>
    </div>

@endsection