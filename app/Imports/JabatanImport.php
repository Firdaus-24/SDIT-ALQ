<?php

namespace App\Imports;

use App\Models\Jabatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class JabatanImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 1;
        foreach ($collection as $row) {
            $fileExisting = Jabatan::where('nama', $row[1])->first();

            if (!$fileExisting) {
                if ($index > 1) {
                    $data['nama'] = !empty($row[1]) ? $row[1] : '';

                    Jabatan::create(
                        [
                            'nama' => $data['nama'],
                            'is_active' => 1
                        ]
                    );
                }
            } else {
                continue;
            }

            $index++;
        }
    }
}
