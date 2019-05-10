@extends('templates.temp')

@section('title','Laporan')

@section('content')
	<div class="form-example-wrap">
		<h4>Form Laporan</h4>
		<br><br>
        <div class="table-responsive">
        	<table id="data-table-basic" class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Name</th>
        				<th>Aksi</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td>1</td>
        				<td>Laporan Semua Peminjaman</td>
        				<td>
        					<a class="btn btn-info btn-sm" target="_blank" href="{{ route('report.create','all') }}">Print</a>
        				</td>
        			</tr>
        			<tr>
        				<td>2</td>
        				<td>Laporan Barang Rusak</td>
        				<td>
        					<a class="btn btn-info btn-sm" target="_blank" href="{{ route('report.create','broken') }}">Print</a>
        				</td>
        			</tr>
        			<tr>
        				<td>3</td>
        				<td>Laporan Barang</td>
        				<td>
        					<a class="btn btn-info btn-sm" target="_blank" href="{{ route('report.barang') }}">Print</a>
        				</td>
        			</tr>
        			<tr>
        				<td>4</td>
        				<td>Laporan Barang di Setiap Ruang</td>
        				<td>
        					<a class="btn btn-info btn-sm" href="{{ route('report.ruang') }}">Lihat</a>
        				</td>
        			</tr>
        		</tbody>
        	</table>
        </div>
    </div>

@endsection