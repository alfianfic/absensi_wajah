<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table='absensi';
    protected $primaryKey='id_absensi';
    public $timestamps = false;
    protected $fillable =[
        'id_absensni',
        'id_user',
        'alpha',
        'sakit',
        'tanggal',
        'jam_kedatangan',
        'jam_pulang',
        'jam_lembur',
        'status_lembur',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
