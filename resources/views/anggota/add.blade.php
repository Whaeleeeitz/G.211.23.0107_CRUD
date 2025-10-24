<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>

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
            👥 Form Tambah Anggota
        </div>

        <div class="card-body">

            {{-- Pesan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('anggota/save') }}" method="POST" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="id" value="">
                <input type="hidden" name="is_update" value="{{ $is_update ?? 0 }}">

                <div class="form-group">
                    <label for="nim">🆔 NIM</label>
                    <input type="text"
                           name="nim"
                           id="nim"
                           class="form-control"
                           placeholder="Masukkan NIM"
                           value="{{ old('nim') }}"
                           maxlength="20"
                           required>
                </div>

                <div class="form-group">
                    <label for="nama">👤 Nama</label>
                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           placeholder="Masukkan nama lengkap"
                           value="{{ old('nama') }}"
                           maxlength="100"
                           required>
                </div>

                <div class="form-group">
                    <label for="progdi">🎓 Program Studi</label>
                    <select name="progdi" id="progdi" class="form-control" required>
                        @foreach ($optprogdi as $key => $value)
                            <option value="{{ $key }}" {{ old('progdi') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" name="btn_simpan" class="btn btn-success btn-custom">
                        💾 Simpan
                    </button>
                    <a href="{{ url('anggota') }}" class="btn btn-secondary btn-custom">⬅️ Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
