<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'plat_nomor',
        'nama_pemilik',
        'merk_kendaraan',
        'keluhan'
    ];

    public $timestamps = true;
}