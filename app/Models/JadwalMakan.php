<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMakan extends Model
{
    use HasFactory;

    // Tentukan kolom mana yang bisa diisi
    protected $fillable = ['tanggal_makan', 'waktu_makan', 'menu'];
}
