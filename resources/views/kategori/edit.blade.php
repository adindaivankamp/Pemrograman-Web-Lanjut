@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Kategori</div>
            <div class="card-body">
                <form method="POST" action="{{ route('kategori.update', $kategori->kategori_id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kodeKategori" class="form-label">Kode Kategori</label>
                        <input type="text" id="kodeKategori" class="form-control" name="kodeKategori" 
                               value="{{ old('kodeKategori', $kategori->kategori_kode) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="namaKategori" class="form-label">Nama Kategori</label>
                        <input type="text" id="namaKategori" class="form-control" name="namaKategori" 
                               value="{{ old('namaKategori', $kategori->kategori_nama) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
