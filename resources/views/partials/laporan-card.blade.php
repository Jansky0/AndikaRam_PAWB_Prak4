<div class="card">
    <h3>Lokasi: {{ $item->lokasi ?? $item['lokasi'] }}</h3>
    <p><strong>Nama Pelapor:</strong> {{ $item->nama_pelapor ?? $item['nama_pelapor'] }}</p>
    <p><strong>Tinggi Genangan Air:</strong> {{ $item->tinggi_genangan ?? $item->tinggi_air ?? $item['tinggi_air'] }} cm</p>
    <p><strong>Tanggal Kejadian:</strong> {{ $item->tanggal_kejadian ?? '-' }}</p>

    @php
        $tinggi = $item->tinggi_genangan ?? $item->tinggi_air ?? $item['tinggi_air'] ?? 0;
    @endphp

    @if($tinggi < 30)
        <p>Status: <span style="color: orange; font-weight: bold;">Waspada</span></p>
    @elseif($tinggi <= 70)
        <p>Status: <span style="color: darkorange; font-weight: bold;">Siaga</span></p>
    @else
        <p>Status: <span style="color: red; font-weight: bold;">Awas</span></p>
    @endif
</div>
