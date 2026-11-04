<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin dan Kasir - Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Poppins', sans-serif; }
        .card-login { width: 100%; max-width: 420px; border: none; border-radius: 16px; box-shadow: 0 4px 18px rgba(0,0,0,0.07); }
        .brand-mark { color: #ff6b00; }
        .btn-orange { background-color: #ff6b00; color: white; font-weight: 600; border-radius: 20px; }
        .btn-orange:hover { background-color: #e56000; color: white; }
    </style>
</head>
<body>

<div class="card card-login p-4 bg-white">
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-1 brand-mark">COFFEE SHOP</h4>
        <p class="text-muted small">Masuk sebagai kasir atau admin menggunakan email</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger py-2 small text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label text-muted small">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@contoh.com" autocomplete="username" required autofocus>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-orange w-100 py-2">Masuk Dashboard</button>
    </form>
</div>

</body>
</html>
