<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewas';
    protected $fillable = ['nama_penyewa', 'no_telp', 'email_penyewa', 'email_verified_at_Penyewa', 'tgl_sewa '];

    use HasFactory;
}
