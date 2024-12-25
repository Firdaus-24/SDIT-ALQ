<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class GuruImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 1;
        foreach ($collection as $row) {
            if ($index > 5) { // Skip header row
                try {
                    // Cek nilai jabatan, default ke 1 jika tidak ditemukan
                    $jabatan = 1;
                    if (!empty($row[2])) {
                        $jabatan = Jabatan::whereRaw('LOWER(nama) = ?', [Str::of($row[2])->trim()->lower()])->value('id') ?? 1;
                    }

                    // Konversi tanggal lahir
                    $tanggalLahir = null;
                    if (!empty($row[5])) {
                        $tanggalLahir = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d');
                    }

                    $noHp = $row[9];
                    // replace format phone
                    $noHp = preg_replace('/^\+62/', '0', $noHp);
                    $noHp = preg_replace('/[-\s]/', '', $noHp);

                    // Data yang akan disimpan
                    $data = [
                        'nama'          => !empty($row[1]) ? $row[1] : null,
                        'jab_id'        => $jabatan,
                        'jenis_kelamin' => !empty($row[3]) ? $row[3] : null,
                        'tempat_lahir'  => !empty($row[4]) ? $row[4] : null,
                        'tanggal_lahir' => $tanggalLahir,
                        'jurusan'       => !empty($row[6]) ? $row[6] : null,
                        'tahun_lulus'   => !empty($row[7]) ? $row[7] : null,
                        'nuptk'         => !empty($row[8]) ? $row[8] : null,
                        'noHp'          => !empty($row[9]) ? $noHp : null,
                        'email'         => !empty($row[10]) ? $row[10] : null,
                        'kelas_id'     => null,
                        'is_active'     => true,
                        'images'        => null,
                    ];
                    // Simpan data
                    Guru::create($data);
                } catch (\Exception $e) {
                    // Log error atau tampilkan pesan jika ada error
                    Log::error('Error importing row: ' . $e->getMessage());
                }
            }

            $index++;
        }
    }
}
