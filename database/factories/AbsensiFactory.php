<?php

namespace Database\Factories;

use App\Models\Absensi;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiFactory extends Factory
{
    protected $model = Absensi::class;

    public function definition(): array
    {
        return [
            'id_siswa' => $this->faker->numberBetween(1, 10),
            'id_jadwal' => $this->faker->numberBetween(1, 10),
            'tanggal' => $this->faker->date('Y-m-d', 'now'),
            'status' => $this->faker->randomElement(['hadir', 'alpha', 'izin']),
        ];
    }
}
