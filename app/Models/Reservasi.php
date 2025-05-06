<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pasien', 'dokter', 'jenis_periksa', 'jadwal', 'status', 'user_id']; // Tambahkan user_id

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
