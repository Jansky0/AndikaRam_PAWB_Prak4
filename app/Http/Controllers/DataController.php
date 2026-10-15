<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Menampilkan daftar laporan dari database
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    // Menampilkan halaman form pelaporan banjir
    public function formbanjir()
    {
        return view('laporan.formbanjir');
    }

    // Menyimpan data laporan banjir ke database menggunakan Laporan::create()
    public function prosesbanjir(Request $request)
    {
        // Mendukung input nama_pelapor / nama, tinggi_genangan / tinggi_air
        $data = [
            'nama_pelapor' => $request->input('nama_pelapor') ?? $request->input('nama'),
            'lokasi' => $request->input('lokasi'),
            'tinggi_genangan' => $request->input('tinggi_genangan') ?? $request->input('tinggi_air') ?? 0,
            'tanggal_kejadian' => $request->input('tanggal_kejadian') ?? now()->toDateString(),
        ];

        $laporan = Laporan::create($data);

        return redirect()->route('laporan.confirmation')->with('laporan', $laporan);
    }

    // Menampilkan halaman konfirmasi setelah data berhasil disimpan
    public function konfirmasi()
    {
        $laporan = session('laporan');

        // Jika halaman diakses langsung atau di-refresh, ambil data terakhir dari database
        if (!$laporan) {
            $laporan = Laporan::latest()->first();
        }

        return view('laporan.konfirmasi', compact('laporan'));
    }
}
