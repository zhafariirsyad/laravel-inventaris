<h1 align="center">Laporan</h1>
<hr>
<p style="float: left;">Tanggal : {{ date("D").','.date('d-m-Y') }}</p>
<p style="float: right;">Operator : {{ Auth::user()->name }}</p>
<br>
@if($type == "all")
<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 6%;" width="100%" >
	<thead>
		<tr>
			<th>No</th>
			<th>Pegawai</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $field)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $field->employee->name }}</td>
			<td>{{ substr($field->borrow_date,0,16) }}</td>
			<td>{{ substr($field->return_date,0,16) }}</td>
			<td>{{ $field->status }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@elseif($type == "broken")
<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 6%;" width="100%" >
	<thead>
		<tr>
			<th>No</th>
			<th>Barang</th>
			<th>Total</th>
			<th>Tanggal Kerusakan</th>
			<th>Tanggal Diperbaiki</th>
		</tr>
	</thead>
	<tbody>
		@foreach($broken as $field)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $field->item->name }}</td>
			<td>{{ $field->total }}</td>
			<td>{{ substr($field->broken_date,0,16) }}</td>
			<td>{{ substr($field->fix_date,0,16) }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
<script>
	window.print();
</script>