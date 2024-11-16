<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nama_lengkap' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
        ];
    }
}
