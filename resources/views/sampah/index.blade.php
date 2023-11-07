@extends('layouts.main')

@section('container')
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2 border-bottom">
				<h1 class="h2 mx-2">Sampah</h1>
			</div>

@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
	{{ session('pesan') }}
</div>
@endif

<a href="/sampah/create" class="btn btn-dark rounded-pill m-2 mb-2"><i class="fa fa-plus-circle align-text-bottom mb-1"></i> New Data</a>

<table id="example1" style="width:100%;" class="table table-boredered mx-2">	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Sampah</th>
			<th>Deskripsi</th>
			<th>Foto</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($sampahs as $sampah)
		<tr>
			<td>{{ $loop->iteration }} </td>
			<td>{{ $sampah->nama_sampah }}</td>
			<td>{{ $sampah->deskripsi }}</td>
            <td>
                <img src="{{ asset('images/' . $sampah->foto) }}" alt="{{ $sampah->nama_sampah }}" width="100px">
            </td>
			<td>Rp. {{ number_format($sampah->harga, 0, ',', '.') }}</td>
			<td>
				<div class="d-flex">
					<a href="{{ url('sampah') }}/{{ $sampah->id }}/edit"class="btn btn-square btn-outline-success m-2"><i class="bi bi-pencil-square"></i></a>
					<form action="{{ url('sampah',$sampah->id) }}" method="post" class="d-inline">
						@method('DELETE')
						@csrf
						<button class="btn btn-square btn-outline-danger m-2" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="bi bi-trash"></i></button>
					</form>
					</div>
			</td>
	
	
		</tr>
		@endforeach
	</tbody>
</table>


@endsection