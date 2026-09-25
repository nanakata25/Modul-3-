@extends('layouts.app')

@section('title', 'Daftar kegiatan')

@section('content')
    <div class="page-heading"><div><p class="eyebrow">Ruang kerja</p><h1>Daftar kegiatan</h1><p class="muted">Atur rencana dan pantau progres kegiatanmu.</p></div><a class="button" href="{{ route('activities.create') }}">+ Kegiatan baru</a></div>
    <form class="filter" method="GET" action="{{ route('activities.index') }}">
        <label for="status">Filter status</label>
        <select id="status" name="status"><option value="">Semua status</option>@foreach ($statuses as $option)<option value="{{ $option }}" @selected($status === $option)>{{ $option }}</option>@endforeach</select>
        <button class="button button-light" type="submit">Terapkan</button>
        @if ($status)<a class="text-link" href="{{ route('activities.index') }}">Hapus filter</a>@endif
    </form>
    @if ($activities->isEmpty())
        <section class="empty-state"><h2>Belum ada kegiatan di sini</h2><p>Tambahkan kegiatan baru atau pilih filter yang berbeda.</p><a class="button" href="{{ route('activities.create') }}">Tambah kegiatan</a></section>
    @else
        <div class="activity-list">
            @foreach ($activities as $activity)
                <article class="activity-card">
                    <div class="activity-copy"><span class="badge badge-{{ strtolower($activity->status) }}">{{ $activity->status }}</span><h2><a href="{{ route('activities.show', $activity) }}">{{ $activity->title }}</a></h2><p>{{ $activity->activity_date->translatedFormat('d F Y') }}</p></div>
                    <a class="text-link" href="{{ route('activities.show', $activity) }}">Lihat detail →</a>
                </article>
            @endforeach
        </div>
    @endif
@endsection
