<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    use HasFactory;

    protected $table = 'kehamilan'; // 👈 Tambahan opsional
    protected $fillable = ['user_id', 'hpht'];

    protected $casts = [
        'hpht' => 'date', // 👈 Supaya bisa pakai Carbon
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
