<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapaket extends Model
{
    use HasFactory;

    protected $table = 'data_paket';
    protected $primaryKey = 'id';
    
    // Menambahkan kolom yang diizinkan untuk diisi secara massal
    protected $fillable = ['nama_paket', 'harga_paket', 'gambar'];

    // Definisikan relasi ke Tagihan
    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}

