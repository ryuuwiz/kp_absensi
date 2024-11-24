<?php

namespace Database\Factories;

use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class MataPelajaranFactory extends Factory
{
    protected $model = MataPelajaran::class;

    public function definition(): array
    {
        return [
            'nama_mapel' => $this->faker->randomElement(['IPA', 'IPS', 'Matematika', 'Fisika', 'Kimia', 'Agama Islam', 'Pemrograman Web', 'Seni Budaya']),
            'id_kelas' => 1,
        ];
    }
}
