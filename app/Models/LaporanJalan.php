<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanJalan extends Model
{
    use HasFactory;

    protected $table = 'laporan_jalan';

    protected $fillable = [
        'kategori_id',
        'judul',
        'lokasi',
        'tingkat_kerusakan',
        'status',
        'nama_pelapor',
        'tanggal_lapor',
        'poin',
        'koordinat',
    ];

    /**
     * Relasi Many-to-One ke model KategoriJalan
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriJalan::class, 'kategori_id');
    }
}
