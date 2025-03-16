@extends('layouts.app')
{{-- Customize layout section --}}
@section('subtitle', 'kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
{{-- conten body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary"> {{-- Membungkus form dalam kartu dengan tema 'primary' --}}
            <div class="card-header">
                <h3 class="card-title">Buat Kategori Baru</h3>
            </div>

            <form method="post" action="../kategori">
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" name="kodeKategori" id="kodeKategori" placeholder="">
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
@endsection