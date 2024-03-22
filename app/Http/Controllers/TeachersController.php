<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreTeachersRequest;
use App\Http\Requests\UpdateTeacherRequest;
use ReturnTypeWillChange;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teacher.index');
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
                $url = route('detailTeacher', ['id' => $data->id]);
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete-jabatan' class='text-xs lg:text-sm text-white rounded p-2' onclick='teacherDeletes({$data->id})' " . ($data->is_active == 'T' ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 'T' ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row '>
                        <button id='btn-teacher' class='text-xs lg:text-sm bg-sky-700 text-white rounded p-2' onclick='window.location.href=\"{$url}\"'>
                            Detail
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);;
        return $dataTable->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $jabatans = DB::table('jabatans')->where('is_active', 'T')->orderBy('name')->get();
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

        return back()->with('msg', 'data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teachers, Request $request)
    {
        $data = Teachers::with([
            'jabatan' => function ($query) {
                $query->latest()->limit(1);
            }
        ])->find($request->id);
        return view('teacher.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teachers $teachers, Request $request)
    {
        $data = Teachers::findOrFail($request->id);
        $jabatans = DB::table('jabatans')->where('is_active', 'T')->orderBy('name')->get();
        return view('teacher.teachersUpdate', compact('data', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teachers $teachers, $idteacher)
    {
        $data = Teachers::find($idteacher);
        if ($request->file('image')) {
            $data->images = $request->file('image')->store('teachers-images');
        }
        $data->code = $request->txtcode;
        $data->name = $request->txtname;
        $data->alamat = $request->txtalamat;
        $data->kelurahan = $request->txtkelurahan;
        $data->kota = $request->txtkota;
        $data->kodepos = $request->txtkodepos;
        $data->jenis_kelamin = $request->txtjk;
        $data->agama = $request->txtagama;
        $data->bank = $request->txtbank;
        $data->rekening = $request->txtrekening;
        $data->tgl_masuk = $request->txttglmasuk;
        $data->tgl_keluar = $request->txttglkeluar;
        $data->no_ktp = $request->txtnoktp;
        $data->noHp = $request->txtnohp;
        $data->email = $request->txtemail;
        $data->jab_id = $request->txtjabatan;
        $data->status = $request->txtstatus;
        $data->jumlah_anak = $request->txtjmlanak;
        $data->is_active = "T";
        $data->save();

        return back()->with('msg', 'data updated successfully');
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
}
