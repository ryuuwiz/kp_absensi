<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    public $timestamps = false;
    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'id_kelas',
        'id_mapel',
    ];

    public function kelas(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mataPelajaran(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
}
