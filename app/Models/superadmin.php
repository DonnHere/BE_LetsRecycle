<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class superadmin extends Authenticatable
{
    
    use HasApiTokens, Notifiable;
    
    protected $table = 'superadmin';
    protected $fillable = ['nama', 'email', 'password'];
}
