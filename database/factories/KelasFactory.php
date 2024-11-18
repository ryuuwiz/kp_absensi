<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;

    public function definition(): array
    {
        return [
            'nama_kelas' => $this->faker->randomElement(['VII', 'VIII', 'IX']) . '-' . $this->faker->numberBetween(1, 5),
            'id_guru' => $this->faker->numberBetween(2, 10),
        ];
    }
}
