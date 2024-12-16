<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelaporan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pelaporan';

    // Kolom primary key
    protected $primaryKey = 'id';

    // Primary key bertipe integer dan auto-increment
    public $incrementing = true;
    protected $keyType = 'integer';

    // Kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'nama',
        'nomor_telepon',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'tanggal_kejadian',
        'deskripsi',
        'file_path',
        'status',
    ];
}