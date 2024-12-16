<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_model extends Model
{

    use HasFactory;
    protected $table = 'user'; // Pastikan model merujuk ke tabel 'user'
    protected $primaryKey = 'id';
    protected $keyType = 'int'; // Define the primary key type as integer

    protected $fillable = ['nama', 'email', 'password'];
}
