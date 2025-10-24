<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>

    {{-- Tambahkan Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            font-weight: 600;
        }
        .btn-custom {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">📖 Daftar Buku</h2>
                <a href="{{ url('buku/add') }}" class="btn btn-light btn-sm">+ Tambah Buku</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th style="width: 60px;">No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Kategori</th>
                                <th style="width: 130px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp

                            @forelse($query as $row)
                            <tr>
                                <td class="text-center">
                                    {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $row['Judul'] }}</td>
                                <td>{{ $row['Pengarang'] }}</td>
                                <td>{{ $optkategori[$row['Kategori']] ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ url('buku/edit/'.$row['ID_Buku']) }}" class="btn btn-warning btn-sm btn-custom">Edit</a>
                                    <a href="{{ url('buku/delete/'.$row['ID_Buku']) }}" 
                                       class="btn btn-danger btn-sm btn-custom"
                                       onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data buku.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ url('/perpus') }}" class="btn btn-secondary btn-sm">← Kembali ke Home</a>
                    <div>{{ $query->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tambahkan script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
