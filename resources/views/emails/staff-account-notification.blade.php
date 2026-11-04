<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Informasi akun Coffee Shop</title></head>
<body style="margin:0;padding:24px;background:#f7f7f5;color:#252525;font-family:Arial,sans-serif">
    <main style="max-width:560px;margin:0 auto;padding:28px;background:#fff;border:1px solid #ecebe7;border-radius:12px">
        <p style="margin:0 0 8px;color:#bd5b28;font-size:12px;font-weight:bold;letter-spacing:1px">COFFEE SHOP</p>
        <h1 style="font-size:22px;margin:0 0 16px">Akun staf Anda sudah tersedia</h1>
        <p>Halo {{ $user->name }}, akun Anda telah disiapkan untuk mengakses sistem Coffee Shop.</p>
        <p style="padding:14px;background:#f7f7f5;border-radius:8px"><strong>Role:</strong> {{ ucfirst($user->role) }}<br><strong>Email login:</strong> {{ $user->email }}</p>
        <p>Gunakan email di atas untuk masuk. Password tidak disertakan dalam email ini.</p>
        <p style="margin:24px 0"><a href="{{ $loginUrl }}" style="padding:11px 18px;background:#bd5b28;border-radius:6px;color:#fff;text-decoration:none">Buka halaman login</a></p>
        <p style="font-size:12px;color:#666">Jika Anda tidak mengenali akun ini, hubungi administrator Coffee Shop.</p>
    </main>
</body>
</html>
