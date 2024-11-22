<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Pertemuan;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\MataPelajaranFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role' => 'admin',
        ])->assignRole('admin');
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@mail.com',
            'role' => 'guru',
        ])->assignRole('guru');
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

        Kelas::factory()->count(1)->create();
        Siswa::factory()->count(30)->create();
        MataPelajaran::factory()->count(10)->create();
        Jadwal::factory()->count(10)->create();
//        Absensi::factory()->count(30)->create();
    }
}
