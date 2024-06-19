<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $table = 'kas';

    protected $fillable = [
        'tgl_kas',
        'keterangan',
        'pemasukan',
        'pengeluaran',
        'jenis_kas',
        'id_tagihan'
    ];
}
