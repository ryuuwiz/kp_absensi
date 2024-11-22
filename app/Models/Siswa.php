<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_siswa';

    protected $table = 'siswa';
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'id_kelas'
    ];

    public $timestamps = false;

    public function kelas(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
