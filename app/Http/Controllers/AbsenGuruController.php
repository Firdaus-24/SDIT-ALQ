<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AbsenGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AbsenGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('absensi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|string',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        // Decode foto dari Base64
        $photo = $request->input('photo');
        $photo = str_replace('data:image/png;base64,', '', $photo);
        $photo = str_replace(' ', '+', $photo);
        $photoData = base64_decode($photo);

        // Buat nama file unik
        $fileName = uniqid('absensi_') . '.png';

        // Simpan file ke folder storage/app/absensi
        $userPath = (Auth::user()->guru_id) ? Auth::user()->guru_id : Auth::user()->id;
        $filePath = 'absensi/' . $userPath . '/' . $fileName;
        Storage::put($filePath, $photoData);

        // Dapatkan URL file yang disimpan
        // $filePath = Storage::url($filePath);

        $currentTime = Carbon::now();
        $hour = $currentTime->hour;

        // Cek apakah sudah ada data absen pada hari ini
        $existingAbsen = AbsenGuru::where('guru_id', $userPath)
            ->whereDate('created_at', $currentTime->toDateString())
            ->first();

        if ($hour >= 6 && $hour < 12) {
            // Jam 6 pagi hingga sebelum jam 12 siang → Absen Masuk
            if (!$existingAbsen) {
                // Buat data baru jika belum ada
                AbsenGuru::create([
                    'guru_id' => $userPath,
                    'image_masuk' => $filePath,
                    'longitude_masuk' => $request->longitude,
                    'latitude_masuk' => $request->latitude,
                ]);
            } else {
                // Hapus file lama jika ada
                if ($existingAbsen->image_masuk && Storage::exists($existingAbsen->image_masuk)) {
                    Storage::delete($existingAbsen->image_masuk);
                }
                // Update data masuk jika sudah ada
                $existingAbsen->update([
                    'image_masuk' => $filePath,
                    'longitude_masuk' => $request->longitude,
                    'latitude_masuk' => $request->latitude,
                ]);
            }
        } elseif ($hour >= 12 && $hour <= 18) {
            // Jam 12 siang hingga jam 6 sore → Absen Pulang
            if ($existingAbsen) {
                // Hapus file lama jika ada
                if ($existingAbsen->image_pulang && Storage::exists($existingAbsen->image_pulang)) {
                    Storage::delete($existingAbsen->image_pulang);
                }
                // Update data pulang jika sudah ada data absen
                $existingAbsen->update([
                    'image_pulang' => $filePath,
                    'longitude_pulang' => $request->longitude,
                    'latitude_pulang' => $request->latitude,
                ]);
            } else {
                // Buat data baru untuk absen pulang jika belum ada
                AbsenGuru::create([
                    'guru_id' => $userPath,
                    'image_pulang' => $filePath,
                    'longitude_pulang' => $request->longitude,
                    'latitude_pulang' => $request->latitude,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Waktu absen tidak valid. Absen hanya dapat dilakukan antara jam 6 pagi hingga jam 6 sore.',
            ], 400);
        }

        return response()->json([
            'message' => 'Data absen berhasil disimpan.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsenGuru $absenGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsenGuru $absenGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbsenGuru $absenGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsenGuru $absenGuru)
    {
        //
    }

    public function dataTable()
    {
        if (Auth::user()->role == 'admin') {
            $absenGuru = AbsenGuru::query()->get();
        } else {
            $absenGuru = AbsenGuru::with('guru')->where('guru_id', Auth::user()->guru_id)->get();
        }
        $dataTable = DataTables::of($absenGuru)
            ->addIndexColumn()
            ->addColumn('tanggal', function ($data) {
                return $data->created_at->format('d-m-Y');
            })
            ->addColumn('nama', function ($data) {
                return $data->guru->nama;
            })
            ->addColumn('jam_masuk', function ($data) {
                $jamMasuk = $data->created_at->format('H:i');
                $jamMasukHour = (int) $data->created_at->format('H');

                if ($jamMasukHour < 6) {
                    return '-';
                }

                if ($jamMasukHour >= 12) {
                    return '<span class="badge badge-sm badge-outline badge-danger text-center">
                                Tidak absen
                            </span>';
                }

                return $jamMasuk;
            })
            ->addColumn('lokasi_masuk', function ($data) {
                return $data->latitude_masuk !== null && $data->longitude_masuk !== null
                    ? '<a href="https://www.google.com/maps?q=' . $data->latitude_masuk . ',' . $data->longitude_masuk . '" target="_blank" class="text-blue-500 text-lg ">
                        <i class="ki-filled ki-map"></i>
                    </a>'
                    : '';
            })
            ->addColumn('jam_keluar', function ($data) {
                $jamKeluar = $data->updated_at->format('H:i');
                $jamKeluarHour = (int) $data->updated_at->format('H');

                if ($jamKeluarHour < 12) {
                    return '-';
                } elseif ($jamKeluarHour >= 18) {
                    return '<span class="badge badge-sm badge-outline badge-danger text-center">
                                Tidak absen
                            </span>';
                } else {
                    return $jamKeluar;
                }
            })
            ->addColumn('lokasi_pulang', function ($data) {
                return $data->latitude_pulang !== null && $data->longitude_pulang !== null
                    ? '<a href="https://www.google.com/maps?q=' . $data->latitude_pulang . ',' . $data->longitude_pulang . '" target="_blank" class="text-blue-500 text-lg">
                       <i class="ki-filled ki-map"></i>
                    </a>'
                    : '';
            })
            ->addColumn('foto', function ($data) {
                $imageMasuk = $data->image_masuk ? asset('storage/' . $data->image_masuk) : asset('assets/images/illustrations/blank.png');
                $imagePulang = $data->image_pulang ? asset('storage/' . $data->image_pulang) : asset('assets/images/illustrations/blank.png');
                $buttons = '
                            <button class="btn btn-primary" onclick="openFotoAbsen(\'' . $imageMasuk . '\', \'' . $imagePulang . '\')"  data-modal-toggle="#modalAbsen">
                                <i class="ki-filled ki-user-square"></i>
                            </button>
                            ';

                return $buttons;
            })
            ->rawColumns(['foto', 'jam_masuk', 'jam_keluar', 'lokasi_masuk', 'lokasi_pulang']);
        return $dataTable->make(true);
    }
}
