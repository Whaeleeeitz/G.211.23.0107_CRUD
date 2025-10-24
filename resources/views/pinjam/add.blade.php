<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pinjam Buku</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-custom {
            border-radius: 10px;
        }
    </style>
</head>

<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            📘 Form Peminjaman Buku
        </div>

        <div class="card-body">

            {{-- Tampilkan pesan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('pinjam/save') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="ID_Anggota">👤 Anggota</label>
                    <select name="ID_Anggota" id="ID_Anggota" class="form-control" required>
                        <option value="">- Pilih Anggota -</option>
                        @foreach ($optanggota as $key => $value)
                            <option value="{{ $key }}" {{ old('ID_Anggota') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ID_Buku">📖 Buku</label>
                    <select name="ID_Buku" id="ID_Buku" class="form-control" required>
                        <option value="">- Pilih Buku -</option>
                        @foreach ($optbuku as $key => $value)
                            <option value="{{ $key }}" {{ old('ID_Buku') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tgl_pinjam">📅 Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control"
                           value="{{ old('tgl_pinjam') }}" required>
                </div>

                <div class="form-group">
                    <label for="tgl_kembali">📆 Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control"
                           value="{{ old('tgl_kembali') }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" name="btn_simpan" class="btn btn-success btn-custom">
                        💾 Simpan
                    </button>
                    <button type="reset" name="btn_batal" class="btn btn-secondary btn-custom">
                        🔄 Batal
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="{{ url('perpus') }}" class="btn btn-outline-primary btn-custom">🏠 Kembali ke Menu</a>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
