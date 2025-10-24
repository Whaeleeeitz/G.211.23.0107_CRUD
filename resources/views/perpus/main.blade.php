<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }
        .container {
            margin-top: 60px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            font-weight: 600;
            font-size: 1.4rem;
        }
        .list-group-item a {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }
        .list-group-item a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .logout-btn {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                📚 Aplikasi Perpustakaan FTIK USM
            </div>

            <div class="card-body">
                <p class="text-center font-weight-bold mb-3">Pilih menu berikut:</p>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ url('buku') }}">📖 Kelola Data Buku</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('anggota') }}">👥 Kelola Data Anggota</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('pinjam') }}">📦 Kelola Transaksi Peminjaman</a>
                    </li>
                </ul>

                <div class="text-center mt-4">
                    <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger logout-btn">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
