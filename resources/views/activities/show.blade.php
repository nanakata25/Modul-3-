@extends('layouts.app')
@section('title', $activity->title)
@section('content')
    <a class="back-link" href="{{ route('activities.index') }}">← Kembali ke daftar</a>
    <article class="panel detail-card">
        <span class="badge badge-{{ strtolower($activity->status) }}">{{ $activity->status }}</span>
        <h1>{{ $activity->title }}</h1>
        <p class="muted">Kode: {{ $activity->code }} · Kategori: {{ $activity->activityCategory?->name ?? $activity->category }}</p>
        <p class="muted">{{ $activity->activity_date->translatedFormat('l, d F Y') }}</p>
        <div class="description">{{ $activity->description ?: 'Tidak ada deskripsi.' }}</div>
        <div class="form-actions"><a class="button" href="{{ route('activities.edit', $activity) }}">Ubah kegiatan</a>
            <form method="POST" action="{{ route('activities.destroy', $activity) }}" onsubmit="return confirm('Hapus kegiatan ini?')">@csrf @method('DELETE')<button class="button button-danger" type="submit">Hapus</button></form>
        </div>
    </article>
@endsection
