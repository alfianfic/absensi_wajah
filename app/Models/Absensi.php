<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table='absensi';
    protected $fillable =[
        'id_absensni',
        'id_user',
        'alpha',
        'sakit',
        'tanggal',
        'jam_kedatangan',
        'jam_pulang',
        'jam_lembur',
        'jam_perhari',
        'status_lembur',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
