<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
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
                <h2 class="mb-0">👥 Daftar Anggota</h2>
                <a href="{{ url('anggota/add') }}" class="btn btn-light btn-sm">+ Tambah Anggota</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th style="width: 60px;">No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Progdi</th>
                                <th style="width: 130px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($query as $row)
                            <tr>
                                <td class="text-center">
    {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
</td>

                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $optprogdi[$row->progdi] ?? $row->progdi }}</td>
                                <td class="text-center">
                                    <a href="{{ url('anggota/edit/'.$row->ID_Anggota) }}" class="btn btn-warning btn-sm btn-custom">Edit</a>
                                    <a href="{{ url('anggota/delete/'.$row->ID_Anggota) }}" 
                                       class="btn btn-danger btn-sm btn-custom"
                                       onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data anggota.</td>
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
