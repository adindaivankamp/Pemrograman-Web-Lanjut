@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Manage Kategori</div>
        <div class="card-body">
            {{ $dataTable->table() }}
            <a href="{{ url('/kategori/create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>Add Kategori
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = $(this).data('url');

            if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        alert(response.message);
                        window.LaravelDataTables["kategori-table"].ajax.reload();
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan, coba lagi.');
                    }
                });
            }
        });
    </script>
@endpush