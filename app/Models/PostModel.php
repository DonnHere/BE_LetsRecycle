<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{

    use HasFactory;
    protected $table = 'posts'; // Pastikan model merujuk ke tabel 'posts'
    protected $primaryKey = 'custom_id'; // Set custom_id as the primary key
    public $incrementing = true; // Enable auto-incrementing
    protected $keyType = 'int'; // Define the primary key type as integer
// Define fillable fields for mass assignment
    protected $fillable = ['title', 'content'];
}
