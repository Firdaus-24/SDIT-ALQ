<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreTeachersRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Imports\TeacherImport;
use Excel;
use Illuminate\Validation\Rule;

class TeachersController extends Controller
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
        return view('teacher.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $jabatans = DB::table('jabatans')->where('is_active', 1)->orderBy('name')->get();
        return view('teacher.teacherAdd', ['jabatans' => $jabatans]);
    }

    public function store(StoreTeachersRequest $request)
    {
        $validate = $request->validated();

        $teachers = new Teachers;
        if ($request->file('image')) {
            $teachers->images = $request->file('image')->store('teachers-images');
        }
        $teachers->code = $request->txtcode;
        $teachers->name = $request->txtname;
        $teachers->alamat = $request->txtalamat;
        $teachers->kelurahan = $request->txtkelurahan;
        $teachers->kota = $request->txtkota;
        $teachers->kodepos = $request->txtkodepos;
        $teachers->jenis_kelamin = $request->txtjk;
        $teachers->agama = $request->txtagama;
        $teachers->bank = $request->txtbank;
        $teachers->rekening = $request->txtrekening;
        $teachers->tgl_masuk = $request->txttglmasuk;
        $teachers->tgl_keluar = $request->txttglkeluar;
        $teachers->no_ktp = $request->txtnoktp;
        $teachers->noHp = $request->txtnohp;
        $teachers->email = $request->txtemail;
        $teachers->jab_id = $request->txtjabatan;
        $teachers->status = $request->txtstatus;
        $teachers->jumlah_anak = $request->txtjmlanak;
        $teachers->is_active = "T";
        $teachers->save();

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teachers, Request $request, $id)
    {
        $data = Teachers::with([
            'jabatan' => function ($query) {
                $query->latest()->limit(1);
            }
        ])->find($id);
        return view('teacher.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teachers $teachers, Request $request, $id)
    {
        $data = Teachers::findOrFail($id);
        $jabatans = DB::table('jabatans')->where('is_active', 1)->orderBy('name')->get();
        return view('teacher.teachersUpdate', compact('data', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teachers $teachers, $id)
    {
        // Validasi input sudah dilakukan di UpdateTeacherRequest
        $validatedData = $request->validate([
            'txtcode' => [
                'max:10',
                Rule::unique('teachers', 'code')->ignore($id, 'id'),
            ],
            'txtname' => 'required|max:100|min:3',
            'txtalamat' => 'required|max:200|min:3',
            'txtkelurahan' => 'max:200|min:3',
            'txtkota' => 'required|max:200|min:3',
            'txtkodepos' => 'required|max:5|min:3',
            'txtjk' => 'required',
            'txtagama' => 'required|max:20|min:3',
            'txtbank' => 'required|max:20|min:3',
            'txtrekening' => 'max:20|min:3',
            'txtnoktp' => 'required|max:16|min:10',
            'txttglmasuk' => 'required',
            'txtnohp' => 'required|max:13|min:11',
            'txtjabatan' => 'required',
            'txtstatus' => 'required',
            'txtjmlanak' => 'required',
            'txtemail' => [
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($id, 'id'),

            ],
            'image' => 'image|file|max:5000',
        ]);

        // Temukan data guru berdasarkan ID
        $teacher = Teachers::findOrFail($id);

        // Handle image upload jika ada file gambar baru
        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($teacher->images)) {
                Storage::delete($teacher->images);
            }
            $teacher->images = $request->file('image')->store('teachers-images');
        }

        // Update data guru
        $teacher->code = $validatedData['txtcode'];
        $teacher->name = $validatedData['txtname'];
        $teacher->alamat = $validatedData['txtalamat'];
        $teacher->kelurahan = $validatedData['txtkelurahan'];
        $teacher->kota = $validatedData['txtkota'];
        $teacher->kodepos = $validatedData['txtkodepos'];
        $teacher->jenis_kelamin = $validatedData['txtjk'];
        $teacher->agama = $validatedData['txtagama'];
        $teacher->bank = $validatedData['txtbank'];
        $teacher->rekening = $validatedData['txtrekening'];
        $teacher->tgl_masuk = $validatedData['txttglmasuk'];
        $teacher->tgl_keluar = $request->input('txttglkeluar', null); // Optional
        $teacher->no_ktp = $validatedData['txtnoktp'];
        $teacher->noHp = $validatedData['txtnohp'];
        $teacher->email = $validatedData['txtemail'];
        $teacher->jab_id = $validatedData['txtjabatan'];
        $teacher->status = $validatedData['txtstatus'];
        $teacher->jumlah_anak = $validatedData['txtjmlanak'];
        $teacher->is_active = 1;
        $teacher->save();

        return back()->with('msg', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teachers, Request $request)
    {
        $data = Teachers::where('id', $request->id)->first();

        if ($data->is_active == 'T') {
            $data->is_active = "F";
            $data->save();
        } else {
            $data->is_active = "T";
            $data->save();
        }
        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataTable()
    {
        $data = Teachers::with('jabatan')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('contact', function ($data) {
                return $data->contact;
            })
            ->addColumn('email', function ($data) {
                return $data->email;
            })
            ->addColumn('jabatan', function ($data) {
                return $data->jabatan->name;
            })
            ->addColumn('actions', function ($data) {
                $url = route('guru.show', $data->id);
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete-jabatan' class='p-2 text-xs text-white rounded lg:text-sm' onclick='teacherDeletes({$data->id},\"{$data->is_active}\")' " . ($data->is_active == 'T' ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 'T' ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row '>
                        <button id='btn-teacher' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='window.location.href=\"{$url}\"'>
                            Detail
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);
        return $dataTable->make(true);
    }

    public function importFile()
    {
        return view('teacher.teacherImport');
    }
    public function prosesImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        Excel::import(new TeacherImport(), $request->file('file'));

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }
}
