@extends('layouts.main')

@section('container')
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2 border-bottom">
				<h1 class="h2 mx-2">Stor Sampah</h1>
			</div>

@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
	{{ session('pesan') }}
</div>
@endif

<a href="/stor/create" class="btn btn-dark rounded-pill m-2 mb-2"><i class="fa fa-plus-circle align-text-bottom mb-1"></i> New Data</a>

<table id="example1" style="width:100%;" class="table table-boredered mx-2">	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis Sampah</th>
			<th>Jumlah Sampah</th>
			<th>Total Harga</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($stors as $stor)
		<tr>
			<td>{{ $loop->iteration }} </td>
			<td>{{ $stor->nama }}</td>
			<td>{{ $stor->sampah_id}}</td>
			<td>{{ $stor->jumlah }}</td>
			<td>Rp. {{ number_format($stor->total, 0, ',', '.') }}</td>
			<td>{{ $stor->status }}</td>
		</tr>
		@endforeach
	</tbody>
</table>


@endsection