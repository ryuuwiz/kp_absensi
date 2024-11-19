<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role' => 'admin',
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@mail.com',
            'role' => 'guru',
        ])->assignRole('guru');

        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@mail.com',
            'role' => 'guru',
        ])->assignRole('guru');

        Kelas::factory()->count(15)->create();

        Siswa::factory()->count(10)->create();
    }
}
