<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriJalan;
use App\Models\LaporanJalan;
use Faker\Factory as Faker;

class JalanSafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Data Master Kategori Kerusakan Jalan
        $kategoriData = [
            [
                'nama_kategori' => 'Lubang Dalam (>15 cm)',
                'deskripsi' => 'Kerusakan aspal berupa lubang dengan kedalaman lebih dari 15 cm yang sangat membahayakan pengendara motor.',
                'poin_dasar' => 50,
            ],
            [
                'nama_kategori' => 'Amblas Permukaan',
                'deskripsi' => 'Penurunan elevasi sebagian permukaan badan jalan akibat kegagalan pondasi tanah atau drainase buruk.',
                'poin_dasar' => 30,
            ],
            [
                'nama_kategori' => 'Retak Struktur',
                'deskripsi' => 'Retakan memanjang dan buaya (alligator crack) yang mengindikasikan kelelahan struktural perkerasan jalan.',
                'poin_dasar' => 20,
            ],
            [
                'nama_kategori' => 'Kerikil Lepas & Licin',
                'deskripsi' => 'Pengelupasan agregat aspal halus yang menyebabkan batuan kerikil berserakan dan memicu risiko tergelincir.',
                'poin_dasar' => 20,
            ],
        ];

        $kategoriIds = [];
        foreach ($kategoriData as $kat) {
            $created = KategoriJalan::firstOrCreate(
                ['nama_kategori' => $kat['nama_kategori']],
                $kat
            );
            $kategoriIds[] = $created->id;
        }

        // Daftar ruas jalan di Kabupaten Bandung & sekitarnya untuk data realistis
        $daftarJalan = [
            'Jl. Raya Bojongsoang No. 128',
            'Jl. Terusan Buah Batu KM 4',
            'Jl. Sukabirus, Desa Citeureup',
            'Jl. Raya Dayeuhkolot No. 45',
            'Jl. Raya Baleendah Depan RSUD',
            'Jl. Raya Rancaekek-Majalaya KM 2',
            'Jl. Siliwangi Baleendah',
            'Jl. Radio Palasari Bojongsoang',
            'Jl. Terusan Kopo Soreang',
            'Jl. Raya Ciparay No. 88',
            'Jl. Banjaran-Pangalengan KM 5',
            'Jl. Raya Laswi Majalaya',
        ];

        $judulLaporan = [
            'Jalan Berlubang Parah Dekat Pasar',
            'Aspal Mengelupas dan Amblas',
            'Retak Memanjang dan Kerikil Lepas',
            'Amblas Dekat Jembatan Utama',
            'Lubang Menganga Mengancam Pengendara',
            'Kerikil Berserakan Membahayakan Motor',
            'Retakan Buaya Memanjang Sepanjang 10 Meter',
            'Genangan Menutupi Lubang Sedalam 20 cm',
            'Penurunan Tanah di Bahu Jalan Raya',
            'Aspal Hancur Akibat Muatan Berat Truk',
            'Permukaan Tidak Rata dan Bergelombang Parah',
            'Lubang Tajam Pasca Tergerus Hujan Lebat',
        ];

        // 2. Data Dummy Laporan Kerusakan Jalan (Minimal 12 data berelasi)
        for ($i = 0; $i < 12; $i++) {
            $katId = $faker->randomElement($kategoriIds);
            $tingkat = $faker->randomElement(['berat', 'sedang', 'ringan']);
            $status = $faker->randomElement(['menunggu', 'dalam_proses', 'selesai']);

            $poin = ($tingkat === 'berat') ? 50 : (($tingkat === 'sedang') ? 30 : 20);

            // Koordinat Bandung (-6.9xxx, 107.6xxx)
            $lat = -6.9000 - ($faker->numberBetween(500, 990) / 10000);
            $lng = 107.6000 + ($faker->numberBetween(200, 450) / 10000);

            LaporanJalan::create([
                'kategori_id' => $katId,
                'judul' => $judulLaporan[$i % count($judulLaporan)],
                'lokasi' => $daftarJalan[$i % count($daftarJalan)] . ', Kab. Bandung',
                'tingkat_kerusakan' => $tingkat,
                'status' => $status,
                'nama_pelapor' => $faker->name(),
                'tanggal_lapor' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'poin' => $poin,
                'koordinat' => number_format($lat, 4) . ', ' . number_format($lng, 4),
            ]);
        }
    }
}
