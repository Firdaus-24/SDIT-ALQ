<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class StudentImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 1;
        foreach ($collection as $row) {
            if ($index > 1) {
                // deklarasi nilai hasil import
                $data['nisn'] = !empty($row[1]) ? $row[1] : '';
                $data['name'] = !empty($row[2]) ? $row[2] : '';
                $data['jenis_kelamin'] = !empty($row[3]) ? $row[3] : 'P';
                $data['tempat_lahir'] = !empty($row[4]) ? $row[4] : '';
                $data['tgl_lahir'] = !empty($row[5]) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]) : now();
                $data['agama'] = !empty($row[6]) ? $row[6] : '';
                $data['wali'] = !empty($row[7]) ? $row[7] : '';
                $data['is_lulus'] = 'F';
                $data['kelas'] = !empty($row[8]) ? $row[8] : 1;
                $data['images'] = '';
                $data['is_active'] = 'T';

                Student::create($data);
            }

            $index++;
        }
    }
}
