@extends('layouts.app')

@section('title', 'Form LaporBanjir')

@section('content')
    <h2>Halaman Form Pelaporan Banjir (LaporBanjir)</h2>

    <form action="{{ route('laporan.store') }}" method="POST">
        @csrf
        <label>Nama Pelapor :</label><br>
        <input type="text" name="nama_pelapor" required><br><br>

        <label>Lokasi Kejadian :</label><br>
        <input type="text" name="lokasi" required><br><br>

        <label>Tinggi Genangan Air (cm) :</label><br>
        <input type="number" name="tinggi_genangan" min="0" required><br><br>

        <label>Tanggal Kejadian :</label><br>
        <input type="date" name="tanggal_kejadian" value="{{ date('Y-m-d') }}" required><br><br>

        <input type="submit" value="Kirim Laporan">
    </form>
@endsection
