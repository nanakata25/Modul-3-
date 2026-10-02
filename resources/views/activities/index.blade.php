@extends('layouts.app')

@section('title', 'Daftar kegiatan')

@section('content')
    <div class="page-heading"><div><p class="eyebrow">Ruang kerja</p><h1>Daftar kegiatan</h1><p class="muted">Atur rencana dan pantau progres kegiatanmu.</p></div><a class="button" href="{{ route('activities.create') }}">+ Kegiatan baru</a></div>
    <form class="filter" method="GET" action="{{ route('activities.index') }}">
        <label for="search">Cari kode atau judul</label>
        <input id="search" name="search" type="search" value="{{ $search }}" placeholder="Masukkan kode atau judul">
        <label for="status">Status</label>
        <select id="status" name="status"><option value="">Semua status</option>@foreach ($statuses as $option)<option value="{{ $option }}" @selected($status === $option)>{{ $option }}</option>@endforeach</select>
        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id"><option value="">Semua kategori</option>@foreach ($categories as $category)<option value="{{ $category->id }}" @selected((string) $categoryId === (string) $category->id)>{{ $category->name }}</option>@endforeach</select>
        <label for="sort">Urut tanggal</label>
        <select id="sort" name="sort"><option value="newest" @selected($sort === 'newest')>Terbaru</option><option value="oldest" @selected($sort === 'oldest')>Terlama</option></select>
        <button class="button button-light" type="submit">Terapkan</button>
        @if ($search || $status || $categoryId)<a class="text-link" href="{{ route('activities.index') }}">Hapus filter</a>@endif
    </form>
    @if ($activities->isEmpty())
        <section class="empty-state"><h2>Belum ada kegiatan di sini</h2><p>Tambahkan kegiatan baru atau pilih filter yang berbeda.</p><a class="button" href="{{ route('activities.create') }}">Tambah kegiatan</a></section>
    @else
        <div class="activity-list">
            @foreach ($activities as $activity)
                <article class="activity-card">
                    <div class="activity-copy"><span class="badge badge-{{ strtolower($activity->status) }}">{{ $activity->status }}</span><h2><a href="{{ route('activities.show', $activity) }}">{{ $activity->title }}</a></h2><p>{{ $activity->code }} · {{ $activity->activityCategory?->name ?? $activity->category }} · {{ $activity->activity_date->translatedFormat('d F Y') }}</p></div>
                    <a class="text-link" href="{{ route('activities.show', $activity) }}">Lihat detail →</a>
                </article>
            @endforeach
        </div>
        {{ $activities->links() }}
    @endif
@endsection
