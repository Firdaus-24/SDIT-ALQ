<?php

namespace App\Imports;

use App\Models\Jabatan;
use App\Models\Teachers;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class TeacherImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 1;
        foreach ($collection as $row) {
            if ($index > 1) {

                // cek nilai jabatan ada atau tidak
                !empty($row[16]) ? $jabatan = Jabatan::where(Str::lower('name'),  Str::of($row[16])->trim()->lower())->value('id') : $jabatan = 1;
                // deklarasi nilai hasil import
                $data['images'] = '';
                $data['code'] = !empty($row[1]) ? $row[1] : null;
                $data['name'] = !empty($row[2]) ? $row[2] : '';
                $data['alamat'] = !empty($row[3]) ? $row[3] : '';
                $data['kelurahan'] = !empty($row[4]) ? $row[4] : '';
                $data['kota'] = !empty($row[5]) ? $row[5] : '';
                $data['kodepos'] = !empty($row[6]) ? $row[6] : '';
                $data['jenis_kelamin'] = !empty($row[7]) ? $row[7] : 'P';
                $data['agama'] = !empty($row[8]) ? $row[8] : '';
                $data['bank'] = !empty($row[9]) ? $row[9] : '';
                $data['rekening'] = !empty($row[10]) ? $row[10] : '';
                $data['no_ktp'] = !empty($row[11]) ? $row[11] : '';
                $data['tgl_masuk'] = !empty($row[12]) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]) : now();
                $data['tgl_keluar'] = null;
                $data['noHp'] = !empty($row[14]) ? $row[14] : '';
                $data['email'] = !empty($row[15]) ? $row[15] : '';
                $data['jab_id'] = $jabatan;
                $data['status'] = !empty($row[17]) ? $row[17] : 'single';
                $data['jumlah_anak'] = !empty($row[18]) ? $row[18] : 0;
                $data['is_active'] = 'T';

                Teachers::create($data);
            }

            $index++;
        }
    }
}
