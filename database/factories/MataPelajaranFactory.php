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
            'nama_mapel' => $this->faker->word(),
            'id_kelas' => 1,
        ];
    }
}
