<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

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
            ✏️ Edit Data Buku
        </div>

        <div class="card-body">

            {{-- Pesan error validasi (jika ada) --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('buku/save') }}" method="POST" accept-charset="utf-8">
                @csrf

                <input type="hidden" name="id" value="{{ $query->ID_Buku }}">
                <input type="hidden" name="is_update" value="{{ $is_update ?? 1 }}">

                <div class="form-group">
                    <label for="Judul">📖 Judul Buku</label>
                    <input type="text"
                           name="Judul"
                           id="Judul"
                           class="form-control"
                           value="{{ $query->Judul }}"
                           maxlength="100"
                           required>
                </div>

                <div class="form-group">
                    <label for="Pengarang">✍️ Pengarang</label>
                    <input type="text"
                           name="Pengarang"
                           id="Pengarang"
                           class="form-control"
                           value="{{ $query->Pengarang }}"
                           maxlength="150"
                           required>
                </div>

                <div class="form-group">
                    <label for="Kategori">🏷️ Kategori</label>
                    <select name="Kategori" id="Kategori" class="form-control" required>
                        @foreach ($optkategori as $key => $value)
                            <option value="{{ $key }}" {{ $query->Kategori == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" name="btn_simpan" class="btn btn-primary btn-custom">
                        💾 Simpan Perubahan
                    </button>
                    <a href="{{ url('buku') }}" class="btn btn-secondary btn-custom">⬅️ Kembali</a>
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
