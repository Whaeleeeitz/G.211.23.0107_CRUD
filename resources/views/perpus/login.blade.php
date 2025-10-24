<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Perpustakaan - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <h3 class="text-center mb-4">🔐 Silahkan Login</h3>

                {{-- Pesan error jika login gagal --}}
                @if(session('loginError'))
                    <div class="alert alert-danger text-center">
                        {{ session('loginError') }}
                    </div>
                @endif

                {{-- Pesan sukses jika logout --}}
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('login') }}" method="POST" accept-charset="utf-8">
                    @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                               name="username"
                               id="username"
                               class="form-control"
                               placeholder="Masukkan username"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>
                    </div>

                    <button type="submit" name="btn_simpan" class="btn btn-primary btn-block">
                        Login
                    </button>
                </form>

            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
