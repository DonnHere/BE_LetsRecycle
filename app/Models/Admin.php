<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin'; // Pastikan sesuai dengan nama tabel di database
    protected $fillable = ['nama', 'email', 'password'];
}
