<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:siswa.list|siswa.create|siswa.edit|siswa.delete'], ['only' => ['index', 'show', 'dataTable', 'searchName']]);
        $this->middleware(['permission:siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:siswa.delete'], ['only' => ['destroy']]);
        $this->middleware(['permission:siswa.import'], ['only' => ['importFile', 'prosesImport']]);
        $this->middleware(['permission:siswa.kenaikan-kelas'], ['only' => ['kenaikanKelas', 'prosesStudentKenaikan', 'getStudentKenaikan']]);
    }

    public function dataTable()
    {
        $data = Siswa::with('kelas')->where('is_lulus', 0)->get();
        $dataTable = DataTables::of($data)
            ->addColumn('nama', function ($data) {
                $imagePath = $data->images ? 'storage/' . $data->images : 'assets/images/nophoto.jpg';
                $imageUrl = asset($imagePath);
                return '
                <div class="flex items-center gap-2.5">
                    <img alt="User Image" class="object-cover rounded-full h-9 w-9" src="' . $imageUrl . '" />
                    <div class="flex flex-col gap-0.5">
                        <p class="text-sm text-gray-900 ">
                            ' . e($data->nama) . '
                        </p>
                    </div>
                </div>
            ';
            })
            ->addColumn('nisn', function ($data) {
                return $data->nisn;
            })
            ->addColumn('jenis_kelamin', function ($data) {
                return $data->jenis_kelamin;
            })
            ->addColumn('tempat_lahir', function ($data) {
                return $data->tempat_lahir;
            })
            ->addColumn('tanggal_lahir', function ($data) {
                return $data->tanggal_lahir;
            })
            ->addColumn('agama', function ($data) {
                return $data->agama;
            })
            ->addColumn('kelas', function ($data) {
                return $data->kelas ? $data->kelas->nama : '-';
            })
            ->addColumn('wali', function ($data) {
                return $data->wali;
            })
            ->addColumn('actions', function ($data) {
                $editButton = '';
                $deleteButton = '';
                $detail = '<button data-modal-toggle="modal_profile" class="btn btn-clear btn-success" onclick="openModalDetailSiswa(\'modal_detail_siswa\', ' . e(json_encode($data))  . ' )"><i class="ki-filled ki-user-square"></i></button>';

                if (auth()->user()->hasPermissionTo('siswa.edit')) {
                    $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                    <i class="ki-filled ki-pencil"></i>
                                    </button>';
                }

                if (auth()->user()->hasPermissionTo('siswa.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"'
                        . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                        . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                        '</a>';
                }

                return '<div class="flex flex-row items-center justify-center">' . $detail . $editButton . $deleteButton . '</div>';
            })->rawColumns(['actions', 'nama']);;
        return $dataTable->make(true);
    }

    public function index()
    {
        $kelas = DB::table('kelas')->where('is_active', 1)->orderBy('nama')->get();
        return view('siswa.index', compact('kelas'));
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
        DB::beginTransaction();
        // Validasi input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'txtnis' => 'nullable|max:100|unique:siswas,nis',
            'txtnisn' => 'nullable|max:100|unique:siswas,nisn',
            'txtnama' => 'required|string|max:255',
            'txtjk' => 'nullable|string|in:P,L|max:1',
            'txttempat' => 'nullable|string|max:100',
            'txttgllahir' => 'nullable|date',
            'txtagama' => 'nullable|string|max:20',
            'txtkelas' => 'nullable|integer|exists:kelas,id',
            'txtwali' => 'nullable|string|max:255',
            'txtrombel' => 'nullable|string|max:200',
        ]);
        try {

            // Menyimpan gambar jika ada
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/siswa', 'public');
            }

            // Simpan data siswa
            Siswa::create([
                'nis' => $validated['txtnis'] ?? null,
                'nisn' => $validated['txtnisn'] ?? null,
                'nama' => $validated['txtnama'],
                'jenis_kelamin' => $validated['txtjk'] ?? null,
                'tempat_lahir' => $validated['txttempat'] ?? null,
                'tanggal_lahir' => $validated['txttgllahir'] ?? null,
                'rombel' => $validated['txtrombel'] ?? null,
                'agama' => $validated['txtagama'] ?? null,
                'kelas_id' => $validated['txtkelas'] ?? null,
                'images' => $imagePath,
                'wali' => $validated['txtwali'] ?? null,
            ]);
            DB::commit();
            return  back()->with('msg', 'Data berhasil disimpan.');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            return  back()->with('msg', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        DB::beginTransaction();
        // Validasi input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'txtnis' => 'nullable|max:100|unique:siswas,nis,' . $siswa->id,
            'txtnisn' => 'nullable|max:100|unique:siswas,nisn,' . $siswa->id,
            'txtnama' => 'required|string|max:255',
            'txtjk' => 'nullable|string|in:P,L|max:1',
            'txttempat' => 'nullable|string|max:100',
            'txttgllahir' => 'nullable|date',
            'txtagama' => 'nullable|string|max:20',
            'txtkelas' => 'nullable|integer|exists:kelas,id',
            'txtwali' => 'nullable|string|max:255',
            'txtrombel' => 'nullable|string|max:200'
        ]);
        try {
            // Menyimpan gambar jika ada
            $imagePath = $siswa->images;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/siswa', 'public');
            }
            // Update data siswa
            $siswa->update([
                'nis' => $validated['txtnis'] ?? null,
                'nisn' => $validated['txtnisn'] ?? null,
                'nama' => $validated['txtnama'],
                'jenis_kelamin' => $validated['txtjk'] ?? null,
                'tempat_lahir' => $validated['txttempat'] ?? null,
                'tanggal_lahir' => $validated['txttgllahir'] ?? null,
                'rombel' => $validated['txtrombel'] ?? null,
                'agama' => $validated['txtagama'] ?? null,
                'kelas_id' => $validated['txtkelas'] ?? null,
                'images' => $imagePath,
                'wali' => $validated['txtwali'] ?? null,
            ]);
            DB::commit();
            return  back()->with('msg', 'Data berhasil update.');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            return  back()->with('msg', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        DB::beginTransaction();
        try {
            $data = Siswa::where('id', $siswa->id)->first();
            if ($data->is_active == 1) {
                $data->is_active = 0;
                $data->save();
            } else {
                $data->is_active = 1;
                $data->save();
            }
            DB::commit();
            return  back()->with('msg', 'Data berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            return  back()->with('msg', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
