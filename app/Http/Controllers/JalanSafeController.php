<?php

namespace App\Http\Controllers;

use App\Models\LaporanJalan;
use App\Models\KategoriJalan;
use Illuminate\Http\Request;

class JalanSafeController extends Controller
{
    /**
     * Menampilkan daftar pengaduan kerusakan jalan dari database
     * dengan relasi ke tabel kategori_jalan
     */
    public function index()
    {
        $laporanJalan = LaporanJalan::with('kategori')->latest()->get();
        return view('jalansafe', compact('laporanJalan'));
    }
}
