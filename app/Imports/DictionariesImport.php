<?php

namespace App\Imports;

use App\Models\Dictionary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DictionariesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dictionary([
            'ngoko' => $row['ngoko'],
            'krama' => $row['krama'],
            'indonesian' => $row['bahasa_indonesia'],
            'example' => $row['contoh_kalimat'],
            'category' => $row['kategori'],
        ]);
    }
}
