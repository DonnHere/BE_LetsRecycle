<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'data_sampahs';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'tahun',
        'provinsi',
        'kabupaten_kota',
        'nama_fasilitas',
        'jenis',
        'status',
        'sampah_masuk_ton_per_thn',
        'sampah_masuk_landfill_ton_per_thn',
        'sampah_organik_terolah_ton_per_thn',
        'sampah_anorganik_terolah_ton_per_thn',
        'recovery_pemulung_ton_per_thn',
        'energi_mw',
        'alamat',
        'kelurahan',
        'kecamatan',
        'pengelola',
        'luas_hektar',
        'sistem_operasional',
        'tgl_awal_operasi',
        'tgl_akhir_operasi',
        'luas_landfill_aktif_m2',
        'pencatatan',
        'jembatan_timbang',
        'penutupan_sampah_zona_aktif',
        'ipl',
        'jml_uji_lindi',
        'ada_drainase',
        'pemanfaatan_gas_metana',
        'latitude',
        'longitude',
    ];
}
