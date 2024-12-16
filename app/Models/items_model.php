<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class items_model extends Model
{
use HasFactory;
/**
* The table associated with the model.
*
* @var string
*/

/**
* The attributes that are mass assignable

*/
// Nama tabel di database
protected $table = 'laporangambar';

// Kolom primary key
protected $primaryKey = 'id';

// Primary key bertipe integer dan auto-increment
public $incrementing = true;
protected $keyType = 'integer';
protected $fillable = [
'nama',
'nohp',
'lokasi',
'aktivitas',
'gambar',
'status',
];
/**
* The attributes that should be cast to native types.
*
* @var array
*/
protected $casts = [
'status' => 'string'
];
/**
* Get a formatted label for the status.
*
* @return string
*/
public function getStatusLabelAttribute()
{
return ucfirst($this->status); // Mengubah huruf pertama status menjadi kapital
}
}
