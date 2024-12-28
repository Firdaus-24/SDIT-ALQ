<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use Excel;
use Carbon\Carbon;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:guru.list|guru.create|guru.edit|guru.delete'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:guru.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:guru.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:guru.delete'], ['only' => ['destroy']]);
        $this->middleware(['permission:guru.import'], ['only' => ['importFile', 'prosesImport']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = DB::table('kelas')->where('is_active', 1)->orderBy('nama')->get();
        $jabatans = DB::table('jabatans')->where('is_active', 1)->orderBy('nama')->get();
        return view('guru.index', compact(['jabatans', 'kelas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = DB::table('jabatans')->where('is_active', 1)->orderBy('nama')->get();
        return view('guru.guruAdd', ['jabatans' => $jabatans]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Parsing tahun dari tanggal lulus
        $year = $request->filled('txttahunlulus')
            ? Carbon::parse($request->txttahunlulus)->year
            : null;

        // Validasi data input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'txtnama' => 'required|string|max:255',
            'txtjabatan' => 'required|integer|exists:jabatans,id',
            'txtemail' => 'required|email|unique:gurus,email|max:255',
            'txtjk' => 'required|string|in:P,L|max:1',
            'txttempat' => 'nullable|string|max:255',
            'txttgllahir' => 'nullable|date',
            'txtjurusan' => 'nullable|string|max:255',
            'txttahunlulus' => 'nullable',
            'txtnuptk' => 'nullable|string|max:100',
            'txtnohp' => 'nullable|string|max:20',
            'txtkelas' => 'nullable|integer|exists:kelas,id',
        ]);

        // Menyimpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/guru');
        }

        // Membuat instance baru dari Guru dan mengisi data
        $teacher = new Guru;
        $teacher->fill([
            'nama' => $validated['txtnama'],
            'jab_id' => $validated['txtjabatan'],
            'jenis_kelamin' => $validated['txtjk'],
            'tempat_lahir' => $validated['txttempat'] ?? null,
            'tanggal_lahir' => $validated['txttgllahir'] ?? null,
            'jurusan' => $validated['txtjurusan'] ?? null,
            'tahun_lulus' => $year,
            'nuptk' => $validated['txtnuptk'] ?? null,
            'noHp' => $validated['txtnohp'] ?? null,
            'email' => $validated['txtemail'],
            'kelas_id' => $validated['txtkelas'] ?? null,
            'is_active' => true, // Set guru sebagai aktif secara default
            'images' => $imagePath,
        ]);

        // Simpan data guru ke database
        $teacher->save();

        // Redirect dengan pesan sukses
        return back()->with('msg', 'Data berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        $data = Guru::with([
            'jabatan' => function ($query) {
                $query->latest()->limit(1);
            }
        ])->find($guru->id);
        return view('guru.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru, $id)
    {
        $data = Guru::findOrFail($id);
        $jabatans = DB::table('jabatans')->where('is_active', 1)->orderBy('name')->get();
        return view('guru.gurusUpdate', compact('data', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'txtnama' => 'required|string|max:255',
            'txtjabatan' => 'required|integer|exists:jabatans,id',
            'txtemail' => 'required|unique:gurus,email,' . $guru->id,
            'txtjk' => 'required|string|max:1',
            'txttempat' => 'nullable|string|max:255',
            'txttgllahir' => 'nullable|date',
            'txtjurusan' => 'nullable|string|max:255',
            'txttahunlulus' => 'nullable',
            'txtnuptk' => 'nullable|string|max:100',
            'txtnohp' => 'nullable|string|max:20',
        ]);

        // Update the image if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($guru->images) {
                Storage::delete($guru->images);
            }
            // Store the new image
            $validated['image'] = $request->file('image')->store('images/guru');
        }

        // Update the Guru instance with validated data
        $guru->update([
            'nama' => $validated['txtnama'],
            'jab_id' => $validated['txtjabatan'],
            'jenis_kelamin' => $validated['txtjk'],
            'tempat_lahir' => $validated['txttempat'],
            'tanggal_lahir' => $validated['txttgllahir'],
            'jurusan' => $validated['txtjurusan'],
            'tahun_lulus' => $validated['txttahunlulus'],
            'nuptk' => $validated['txtnuptk'],
            'noHp' => $validated['txtnohp'],
            'email' => $validated['txtemail'],
            'images' => $validated['image'] ?? $guru->images,
        ]);

        // Redirect back with a success message
        return back()->with('msg', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $data = Guru::where('id', $guru->id)->first();
        if ($data->is_active == 1) {
            $data->is_active = 0;
            $data->save();
        } else {
            $data->is_active = 1;
            $data->save();
        }
        return Response()->json($data);
    }
    public function dataTable()
    {
        $data = Guru::with('jabatan')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
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
            ->addColumn('jabatan', function ($data) {
                return ($data->jabatan) ? $data->jabatan->nama : '-';
            })
            ->addColumn('jenis_kelamin', function ($data) {
                return $data->jenis_kelamin;
            })
            ->addColumn('contact', function ($data) {
                return $data->noHP;
            })
            ->addColumn('email', function ($data) {
                return $data->email;
            })
            ->addColumn('status', function ($data) {
                $active = ($data->is_active == 1) ? '<span class="badge badge-sm badge-outline badge-success">Active</span>' : '<span class="badge badge-sm badge-outline badge-danger">Deleted</span>';
                return $active;
            })
            ->addColumn('actions', function ($data) {
                $editButton = '';
                $deleteButton = '';
                $detail = '<button data-modal-toggle="modal_profile" class="btn btn-clear btn-success" onclick="openModalDetail(\'modal_profile\', ' . e(json_encode($data))  . ' )"><i class="ki-filled ki-user-square"></i></button>';

                if (auth()->user()->hasPermissionTo('guru.edit')) {
                    $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                    <i class="ki-filled ki-pencil"></i>
                                    </button>';
                }

                if (auth()->user()->hasPermissionTo('guru.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"'
                        . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                        . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                        '</a>';
                }

                return '<div class="flex flex-row items-center justify-center">' . $detail . $editButton . $deleteButton . '</div>';
            })
            ->rawColumns(['nama', 'status', 'actions']);
        return $dataTable->make(true);
    }
    public function importFile()
    {
        return view('guru.guruImport');
    }
    public function prosesImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        Excel::import(new GuruImport(), $request->file('file'));

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }
}
