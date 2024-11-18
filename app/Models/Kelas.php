<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'nama_kelas',
        'id_guru'
    ];

    public $timestamps = false;

    public function siswa(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas'); // Relationship to Siswa
    }

    public function guru(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id_guru', 'id'); // Relationship to User
    }

    public function scopeGurus($query)
    {
        return $query->where('role', 'guru'); // Scope to filter users with role 'guru'
    }
}
