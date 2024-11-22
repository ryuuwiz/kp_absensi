<?php

namespace Database\Factories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    protected $model = Jadwal::class;

    public function definition(): array
    {
        return [
            'hari' => $this->faker->dayOfWeek(),
            'jam_mulai' => $this->faker->time(),
            'jam_selesai' => $this->faker->time(),
            'id_kelas' => 1,
            'id_mapel' => $this->faker->numberBetween(1, 10),
        ];
    }
}
