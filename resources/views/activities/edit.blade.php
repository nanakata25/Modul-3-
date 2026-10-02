@extends('layouts.app')
@section('title', 'Ubah kegiatan')
@section('content')
    <p class="eyebrow">Perbarui informasi</p><h1>Ubah kegiatan</h1><p class="muted">Perubahan status mengikuti alur Draft → Published → Completed.</p>
    <form class="panel form" method="POST" action="{{ route('activities.update', $activity) }}">
        @csrf @method('PUT')
        @include('activities._form', ['submitLabel' => 'Simpan perubahan'])
    </form>
@endsection
