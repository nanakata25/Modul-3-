@extends('layouts.app')
@section('title', 'Tambah kegiatan')
@section('content')
    <p class="eyebrow">Kegiatan baru</p><h1>Tambah kegiatan</h1><p class="muted">Isi detail kegiatan. Kolom bertanda * wajib diisi.</p>
    <form class="panel form" method="POST" action="{{ route('activities.store') }}">
        @csrf
        @include('activities._form', ['submitLabel' => 'Simpan kegiatan'])
    </form>
@endsection
