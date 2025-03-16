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
        </div>
        <div class="card-footer text-end">
            <a href="{{ url('/kategori/create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Kategori
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush