<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_model extends Model
{

    use HasFactory;
    protected $table = 'admin'; // Pastikan model merujuk ke tabel 'admin'
    protected $primaryKey = 'id'; // Set custom_id as the primary key
    public $incrementing = true; // Enable auto-incrementing
    protected $keyType = 'int'; // Define the primary key type as integer
// Define fillable fields for mass assignment
    protected $fillable = ['nama', 'email', 'password'];
}
