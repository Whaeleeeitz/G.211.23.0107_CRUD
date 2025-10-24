<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_m;
use App\Models\Anggota_m;
use App\Models\Pinjam_m; 

class PinjamController extends Controller
{
    // Menampilkan DAFTAR Peminjaman (Sesuai Latihan Pagination)
    public function index()
    {
        $query = Pinjam_m::select(
                    'pinjam.*', 
                    'mst_anggota.nim', 'mst_anggota.nama', 
                    'mst_buku.Judul'
                 )
                 ->join('mst_anggota', 'pinjam.ID_Anggota', '=', 'mst_anggota.ID_Anggota')
                 ->join('mst_buku', 'pinjam.ID_Buku', '=', 'mst_buku.ID_Buku')
                 ->Paginate(5); 

        $data = [
            'query' => $query
        ];
        return view('pinjam.list', $data);
    }

    // Menampilkan FORM TAMBAH Peminjaman (Sesuai Modul 5)
    public function add(Buku_m $buku, Anggota_m $anggota)
    {
        $data = [
            'optanggota' => $anggota->opt_anggota(),
            'optbuku' => $buku->opt_buku()
        ];
        return view('pinjam.add', $data);
    }

    // ================================================
    // == FUNGSI SAVE DENGAN VALIDASI (SESUAI LATIHAN) ==
    // ================================================
    public function save(Pinjam_m $pinjam, Request $request)
    {
        // 1. Definisikan aturan validasi
        $rules = [
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ];

        // 2. Definisikan nama atribut yang "cantik" (memperbaiki error "i d anggota")
        $attributes = [
            'ID_Anggota' => 'Anggota',
            'ID_Buku'    => 'Buku',
            'tgl_pinjam' => 'Tanggal Pinjam',
            'tgl_kembali'=> 'Tanggal Kembali',
        ];

        // 3. Jalankan validasi
        $validated = $request->validate($rules, [], $attributes);
        // ================================================


        // Kode simpan data (sesuai database 'tgl_pinjam' huruf kecil)
        $data['ID_Anggota'] = $request->input('ID_Anggota');
        $data['ID_Buku'] = $request->input('ID_Buku');
        $data['tgl_pinjam'] = $request->input('tgl_pinjam');
        $data['tgl_kembali'] = $request->input('tgl_kembali');

        if ($pinjam->insert_record($data)) {
            // Arahkan ke daftar list, bukan form lagi
            return redirect('pinjam'); 
        }
    }
}
