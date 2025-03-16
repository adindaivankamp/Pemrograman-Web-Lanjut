@extends('adminlte::page') {{-- Menggunakan template utama dari AdminLTE --}}
{{-- Extend and customize the browser tittle --}}
@section('title')
    {{ config('adminlte.title')}}  {{-- Mengambil konfigurasi title dari file konfigurasi adminlte.php --}}
    @hasSection('subtitle') | @yield('subtitle') @endif {{-- Jika ada section subtitle, maka akan ditampilkan setelah title dengan pemisah "|" --}}
@endsection

@vite('resources\js\app.js') {{--Menghubungkan file JavaScript dengan Vite untuk bundling dan optimalisasi --}}

{{-- extend and customize the page content header --}}
@section('content_header')
    @hasSection ('content_header_title') {{-- Mengecek apakah section content_header_title ada --}}
        <h1 class="text-muted">
            @yield('content_header_title')  {{-- Menampilkan isi dari content_header_title --}}

            @hasSection ('content_header_subtitle')  {{-- Mengecek apakah section content_header_subtitle ada --}}
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>  {{-- Menampilkan ikon panah kecil --}}
                    @yield('content_header_subtitle')   {{-- Menampilkan isi dari content_header_subtitle --}}
                </small>
            @endif
        </h1>
    @endif
@endsection

{{-- rename section content to content_body --}}

@section('content')
    @yield('content_body') {{-- Menampilkan isi dari content_body agar dapat digunakan di halaman turunan --}}
@endsection

{{-- create a common footer --}}
@section('footer')
<div class="float-right">
    Version: {{ config('app.version', '1.0.0')}}  {{-- Menampilkan versi aplikasi dari file konfigurasi app.php --}}
</div>

<strong>
    <a href="{{ config('app.company_url', '#')}}">
        {{ config('app.company_name', 'My Company')}}  {{-- Menampilkan nama dan URL perusahaan dari konfigurasi app.php --}}
    </a>
</strong>
@endsection

{{-- add common js/jquery code --}}
@push('js')
   <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js">
        // $(document).ready(function(){
        //     //add your common script logic here..
        // });

    </script> 
@endpush

@stack('scripts')

{{-- add cummon css customizations --}}
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">

<style type="text/css">
    /* you can add adminlte customizations here */
    /*.card-header{
        border-bottom: none;
    }
    .card-title{
        font-weight: 600;
    } */
</style>
@endpush