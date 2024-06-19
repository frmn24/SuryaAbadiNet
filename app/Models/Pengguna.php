<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'id';

    // Definisikan relasi ke Tagihan
    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }

}