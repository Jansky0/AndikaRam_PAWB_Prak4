@extends('layouts.app')

@section('title', 'Konfirmasi Laporan Banjir')

@section('content')
    <h2>Konfirmasi Laporan Banjir</h2>

    {{-- Komponen Alert --}}
    <x-alert type="success" message="Data laporan banjir berhasil disimpan ke database." />

    @php
        $nama = $laporan->nama_pelapor ?? $nama ?? 'Wahyudi';
        $lokasi = $laporan->lokasi ?? $lokasi ?? 'Dayeuhkolot';
        $tinggi = $laporan->tinggi_genangan ?? $tinggi_genangan ?? 45;
        $tanggal = $laporan->tanggal_kejadian ?? $tanggal ?? date('Y-m-d');
    @endphp

    <div class="card">
        <p><strong>Nama Pelapor:</strong> {{ $nama }}</p>
        <p><strong>Lokasi Kejadian:</strong> {{ $lokasi }}</p>
        <p><strong>Tinggi Genangan Air:</strong> {{ $tinggi }} cm</p>
        <p><strong>Tanggal Kejadian:</strong> {{ $tanggal }}</p>

        @if(is_numeric($tinggi))
            @if($tinggi < 30)
                <p><strong>Status:</strong> <span style="color: orange; font-weight: bold;">Waspada</span></p>
            @elseif($tinggi <= 70)
                <p><strong>Status:</strong> <span style="color: darkorange; font-weight: bold;">Siaga</span></p>
            @else
                <p><strong>Status:</strong> <span style="color: red; font-weight: bold;">Awas</span></p>
            @endif
        @endif
    </div>

    <br>
    <a href="{{ route('laporan.form') }}">Buat Laporan Baru</a> | 
    <a href="{{ route('laporan.index') }}">Lihat Semua Laporan</a>
@endsection
