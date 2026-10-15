<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJalan extends Model
{
    use HasFactory;

    protected $table = 'kategori_jalan';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'poin_dasar',
    ];

    /**
     * Relasi One-to-Many ke model LaporanJalan
     */
    public function laporan()
    {
        return $this->hasMany(LaporanJalan::class, 'kategori_id');
    }
}
