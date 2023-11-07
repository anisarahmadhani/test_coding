@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ url('sampah',$sampah->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Tambahkan metode PUT untuk mengupdate data -->

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_sampah') is-invalid @enderror" name="nama_sampah" id="nama_sampah" value="{{ old('nama_sampah', $sampah->nama_sampah) }}">
                @error('nama_sampah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $sampah->deskripsi) }}">
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control  @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" value="{{ old('foto') }}">
                @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

            <div class="form-group">
                <label class="col-form-label">Harga</label>
                <input type="text" class="form-control" name="harga" id="tambah_harga" value="{{ old('harga', $sampah->harga) }}">
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
        <script>
            const rupiahInput = document.getElementById('tambah_harga');
            rupiahInput.addEventListener('input', function (e) {
                let value = e.target.value;
                value = value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'); // Tambahkan titik sebagai pemisah ribuan
                e.target.value = `Rp ${value}`;
            });
        </script>
    </div>
</div>
<!--  -->
@endsection
