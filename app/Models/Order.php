<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'satuan',
        'jenis_tipe',
        'bundle_pilihan',
        'satuan_ram',
        'pilih_warna',
        'satuan_ssd',
        'tipe_windows'
    ];
}
