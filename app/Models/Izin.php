<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izin';
    protected $primaryKey = 'id_izin';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'file_izin',
        'status',
        'tgl',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
