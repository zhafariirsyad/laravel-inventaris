@extends('templates.temp')

@section('title','Detail Barang')

@section('content')

	<div class="form-example-wrap">
		<h4>Detail Barang</h4><br>
		<table class="table">
			<tr>
				<td><h5>Nama</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->name }}</h5></td>
			</tr>
			<tr>
				<td><h5>Tipe</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->type->name }}</h5></td>
			</tr>
			<tr>
				<td><h5>Ruangan</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->room->name }}</h5></td>
			</tr>
			<tr>
				<td><h5>Yang Menginput</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->user->name }}</h5></td>
			</tr>
			<tr>
				<td><h5>Total</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->total }}</h5></td>
			</tr>
			<tr>
				<td><h5>Deskripsi</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->description }}</h5></td>
			</tr>
			<tr>
				<td><h5>Tanggal Input</h5></td>
				<td><h5>:</h5></td>
				<td><h4>{{ $item->register_date }}</h5></td>
			</tr>
		</table>
	</div>

@endsection