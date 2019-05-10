<h1 align="center">Laporan Barang</h1>
<hr>
<p style="float: left;">Tanggal : {{ date("D").','.date('d-m-Y') }}</p>
<p style="float: right;">Operator : {{ Auth::user()->name }}</p>
<br>

<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 6%;" width="100%" >
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Ruangan</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $field)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $field->name }}</td>
			<td>{{ $field->room->name }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<script>
	window.print();
</script>