<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Activity Manager') · Activity Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <a class="brand" href="{{ route('activities.index') }}">Activity Manager</a>
        <nav aria-label="Navigasi utama"><a href="{{ route('activities.index') }}">Kegiatan</a><a class="button button-small" href="{{ route('activities.create') }}">Tambah kegiatan</a></nav>
    </header>
    <main class="container">
        @if (session('success')) <div class="alert success" role="status">{{ session('success') }}</div> @endif
        @if ($errors->any()) <div class="alert error" role="alert"><strong>Periksa kembali isian:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
        @yield('content')
    </main>
</body>
</html>
