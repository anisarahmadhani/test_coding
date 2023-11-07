@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ url('stor') }}" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
              <!-- untuk memberi peringatan harus 10 angka -->
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Sampah</label>
                <select class="form-select" name="sampah_id" aria-label="Default select example">
                  @foreach ($sampahs as $sampah)
                  <option value="{{ $sampah->id }}">{{ $sampah->nama_sampah}}</option>
                  @endforeach
            </select>
            </div>

        <div class="mb-3">
          <label class="form-label">Jumlah Sampah</label>
          <input type="text" class="form-control" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" >
          
          @error('jumlah')
          <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
 

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Tambah Data</button>
</div>

</form>
</div>
</div>
<!--  -->


@endsection