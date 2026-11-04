<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu - Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/staff.css') }}" rel="stylesheet">
    <style>
        body { background: #f7f7f5; color:#252525; font-family: Inter, 'Segoe UI', sans-serif; }
        .panel,.topbar { background:#fff; border:1px solid #ecebe7; border-radius:12px; }
        .btn-accent { background:#bd5b28; border-color:#bd5b28; color:#fff; }
        .btn-accent:hover { background:#a64b20; border-color:#a64b20; color:#fff; }
    </style>
</head>
<body>
<main class="container py-4">
    <header class="topbar p-3 p-md-4 d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="text-uppercase small fw-semibold" style="color:#bd5b28">Coffee Shop</div>
            <h1 class="h4 fw-bold mb-1">Kelola menu</h1>
            <p class="text-muted small mb-0">Atur daftar menu, kategori, harga, dan ketersediaan</p>
        </div>
        <a href="{{ route('admin.menus.create') }}" class="btn btn-accent btn-sm">Tambah menu</a>
        <div class="w-100">@include('admin.partials.navigation')</div>
    </header>

    @if(session('success'))
        <div class="alert alert-success rounded-3">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger rounded-3">{{ $errors->first() }}</div>
    @endif

    <section class="panel bg-white p-3 p-md-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Nama Menu</th><th>Kategori</th><th>Harga</th><th>Status</th><th class="text-end">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                        <tr>
                            <td><div class="fw-semibold">{{ $menu->nama_menu }}</div><small class="text-muted">{{ $menu->deskripsi }}</small></td>
                            <td>{{ $menu->category->nama_kategori ?? '—' }}</td>
                            <td class="fw-semibold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td><span class="badge {{ $menu->is_available ? 'bg-success' : 'bg-secondary' }}">{{ $menu->is_available ? 'Tersedia' : 'Tidak tersedia' }}</span></td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-outline-secondary btn-sm">Ubah</a>
                                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada menu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>
