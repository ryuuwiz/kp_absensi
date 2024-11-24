<?php

namespace App\Filament\Guru\Resources\AbsensiResource\Pages;

use App\Filament\Guru\Resources\AbsensiResource;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Siswa;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;

class FormAbsensi extends Page
{
    protected static string $resource = AbsensiResource::class;

    protected static string $view = 'filament.guru.resources.absensi-resource.pages.form-absensi';

    protected static ?string $title = 'Form Absensi';
    protected ?string $heading = 'Form Absensi';

    public $id_kelas;
    public $id_jadwal;

    public $jadwal = [];
    public $siswa = [];

    public $data = [];
    public $status = [];

    public function mount(): void
    {
        $this->jadwal = Jadwal::all();
    }

    public function pilihAbsen(): void
    {
        $this->data = Siswa::where('id_kelas', function ($query) {
            $query->select('id_kelas')
                ->from('jadwal')
                ->where('id_jadwal', $this->id_jadwal);
        })->orderBy('nama_lengkap', 'ASC')->get();

        foreach ($this->data as $item) {
            $this->status[$item->id_siswa] = 'hadir'; // Default status
        }
    }

    public function simpanAbsensi(): void
    {
        foreach ($this->status as $id_siswa => $status) {
            Absensi::updateOrCreate(
                ['id_siswa' => $id_siswa, 'id_jadwal' => $this->id_jadwal],
                ['tanggal' => now(), 'status' => $status]
            );
        }

        Notification::make()
            ->title('Absensi Berhasil Disimpan!')
            ->success()
            ->send();
    }
}
