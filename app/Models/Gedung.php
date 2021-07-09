<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedungs';
    protected $fillable = ['nama_gedung', 'description', 'harga_sewa', 'icon'];

    public function showImage ()
    {
        if (Storage::exists($this->icon)) {
            return "storage/$this->icon";
        }
        return asset('admin/assets/images/img3.jpg');
    }
}
