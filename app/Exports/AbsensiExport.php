<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;

class AbsensiExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    private Collection $records;

    public function __construct(Collection $records)
    {
        $this->records = $records;
    }

    public function collection(): Collection
    {
        return $this->records;
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Nama Kelas',
            'Mata Pelajaran',
            'Tanggal',
            'Status',
        ];
    }

    public function map($absensi): array
    {
        return [
            $absensi->siswa->nama_lengkap,
            $absensi->siswa->kelas->nama_kelas,
            $absensi->jadwal->mataPelajaran->nama_mapel,
            $absensi->jadwal->tanggal,
            $absensi->status,
        ];
    }
}
