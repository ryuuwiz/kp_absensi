<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return Model|Siswa|null
     */
    public function model(array $row): Model|Siswa|null
    {
        return new Siswa([
            "nis" => $row["nis"],
            "nama_lengkap" => $row["nama_lengkap"],
            "jenis_kelamin" => $row["jenis_kelamin"],
            "alamat" => $row["alamat"],
        ]);
    }


}
