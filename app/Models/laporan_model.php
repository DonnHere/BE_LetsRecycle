<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_model extends Model
{

    use HasFactory;
    protected $table = 'laporan'; // Pastikan model merujuk ke tabel 'laporan'
    protected $primaryKey = 'id'; // Set custom_id as the primary key
    public $incrementing = true; // Enable auto-incrementing
    protected $keyType = 'int'; // Define the primary key type as integer
// Define fillable fields for mass assignment
    protected $fillable = ['nama', 'nohp', 'lokasi', 'aktivitas'];
}
