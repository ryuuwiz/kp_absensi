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
        'alamat',
    ];

    public $timestamps = false;
}
