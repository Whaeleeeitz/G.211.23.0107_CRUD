<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Buku</title>
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
                <h2 class="mb-0">📚 Daftar Peminjaman Buku</h2>
                <a href="{{ url('pinjam/add') }}" class="btn btn-light btn-sm">+ Tambah Peminjaman</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th style="width: 60px;">No</th>
                                <th>Nama Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($query as $row)
                            <tr>
                                <td class="text-center">
                                    {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $row->nim }} - {{ $row->nama }}</td>
                                <td>{{ $row->Judul }}</td>
                                <td class="text-center">{{ $row->tgl_pinjam }}</td>
                                <td class="text-center">{{ $row->tgl_kembali }}</td>
                                <td class="text-center">
                                    <a href="{{ url('pinjam/delete/'.$row->ID_Pinjam) }}" 
                                       class="btn btn-danger btn-sm btn-custom" 
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                                       Hapus
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada data peminjaman.</td>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
