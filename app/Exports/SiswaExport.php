<?php

namespace App\Exports;

use AllowDynamicProperties;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    private Collection $records;

    /**
     * @param Collection $records
     */
    public function __construct(Collection $records)
    {
        $this->records = $records;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return $this->records;
    }

    /**
     * @param $siswa
     * @return array
     */
    public function map($siswa): array
    {
        return [
            $siswa->nis,
            $siswa->nama_lengkap,
            $siswa->jenis_kelamin,
            $siswa->alamat,
        ];
    }


    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'NIS',
            "Nama Lengkap",
            "Jenis Kelamin",
            "Alamat",
        ];
    }
}
