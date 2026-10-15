@extends('layouts.app')

@section('title', 'JalanSafe - Pelaporan Kerusakan Jalan')

@section('content')
    <div style="margin-bottom: 20px;">
        <h2>JalanSafe - Platform Pelaporan Kerusakan Jalan</h2>
        <p style="color: #555; margin-top: 4px;">
            Implementasi Database &amp; Eloquent ORM untuk Tugas Akhir Pemrograman Web Semester 2 (Andika Ramadhan, Sri Haryati, Nadira Az-Zahra).
        </p>
    </div>

    {{-- Komponen Reusable Blade Alert --}}
    <x-alert type="success" message="Database Tugas Akhir JalanSafe berhasil terhubung ke MySQL dan diisi data seeder otomatis." />

    {{-- Ringkasan Statistik Singkat --}}
    <div class="card" style="background: #fafafa; border-left: 4px solid #007bff;">
        <h3 style="margin-top: 0;">Tentang Sistem JalanSafe</h3>
        <p>
            JalanSafe adalah platform berbasis geotagging untuk mendeteksi dan melaporkan titik jalan rusak secara presisi.
            Data kerusakan jalan berelasi langsung dengan tabel kategori kerusakan dan dilengkapi sistem apresiasi reward poin bagi warga.
        </p>
    </div>

    <h3>Daftar Pengaduan Kerusakan Jalan Terkini (Database MySQL)</h3>

    {{-- Perulangan Data dengan Directive Blade @forelse --}}
    @forelse($laporanJalan as $jalan)
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap;">
                <div>
                    <h3 style="margin: 0 0 6px 0;">{{ $jalan->judul ?? $jalan['judul'] }}</h3>
                    <p style="margin: 2px 0;"><strong>Lokasi:</strong> {{ $jalan->lokasi ?? $jalan['lokasi'] }}</p>
                    <p style="margin: 2px 0; color: #555;"><small>Koordinat Geotagging: {{ $jalan->koordinat ?? $jalan['koordinat'] }}</small></p>
                </div>
                <div style="text-align: right;">
                    <span style="background: #eef; color: #007bff; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 11px;">
                        +{{ $jalan->poin ?? $jalan['poin'] }} Poin Reward
                    </span>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #eee; margin: 10px 0;">

            <p style="margin: 4px 0;">
                <strong>Kategori Kerusakan:</strong> 
                <span style="background: #f0f0f0; padding: 2px 6px; border-radius: 3px;">
                    {{ $jalan->kategori->nama_kategori ?? $jalan['kategori'] ?? '-' }}
                </span>
            </p>

            @php
                $tingkat = $jalan->tingkat_kerusakan ?? $jalan['tingkat_kerusakan'] ?? 'ringan';
                $status = $jalan->status ?? $jalan['status'] ?? 'menunggu';
            @endphp

            {{-- Percabangan Blade @if / @elseif / @else untuk Tingkat Kerusakan --}}
            <p style="margin: 4px 0;">
                <strong>Tingkat Urgensi:</strong>
                @if($tingkat === 'berat')
                    <span style="color: red; font-weight: bold;">[BERAT] Butuh Penanganan Cepat</span>
                @elseif($tingkat === 'sedang')
                    <span style="color: darkorange; font-weight: bold;">[SEDANG] Masuk Antrean Perbaikan</span>
                @else
                    <span style="color: green; font-weight: bold;">[RINGAN] Dalam Pemantauan Rutin</span>
                @endif
            </p>

            {{-- Percabangan Status Penanganan --}}
            <p style="margin: 4px 0;">
                <strong>Status Penanganan:</strong>
                @if($status === 'selesai')
                    <span style="color: #28a745; font-weight: bold;">&#10003; Selesai Diperbaiki</span>
                @elseif($status === 'dalam_proses')
                    <span style="color: #007bff; font-weight: bold;">&#9881; Dalam Pengerjaan Dinas</span>
                @else
                    <span style="color: #6c757d; font-weight: bold;">&#9203; Menunggu Verifikasi Lapangan</span>
                @endif
            </p>

            <hr style="border: none; border-top: 1px dashed #eee; margin: 8px 0;">

            <div style="font-size: 12px; color: #666; display: flex; justify-content: space-between;">
                <span><strong>Pelapor:</strong> {{ $jalan->nama_pelapor ?? $jalan['pelapor'] }}</span>
                <span><strong>Tanggal Lapor:</strong> {{ $jalan->tanggal_lapor ?? $jalan['tanggal'] }}</span>
            </div>
        </div>
    @empty
        <p>Belum ada pengaduan kerusakan jalan yang tersimpan di database.</p>
    @endforelse
@endsection
