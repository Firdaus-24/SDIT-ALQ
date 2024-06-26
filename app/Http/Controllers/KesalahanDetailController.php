<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Student;
use App\Models\Kesalahan;
use Illuminate\Http\Request;
use App\Models\kesalahanDetail;
use Yajra\DataTables\Facades\DataTables;

class KesalahanDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:detailkesalahan-siswa.list|detailkesalahan-siswa.create|detailkesalahan-siswa.edit|detailkesalahan-siswa.delete'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:detailkesalahan-siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:detailkesalahan-siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:detailkesalahan-siswa.delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('kesalahan-detail.index');
    }

    public function dataTable()
    {
        $data = kesalahanDetail::with('student', 'kesalahan')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->student->name;
            })
            ->addColumn('kelas', function ($data) {
                return $data->student->kelas;
            })
            ->addColumn('kesalahan', function ($data) {
                return $data->kesalahan->name;
            })
            ->addColumn('tanggal', function ($data) {
                return $data->tanggal;
            })
            ->addColumn('keterangan', function ($data) {
                return $data->keterangan;
            })
            ->addColumn('actions', function ($data) {
                $url = route('detailkesalahan-siswa.edit', $data->id);
                $str = "<a href='#' type='button' id='btn-delete' class='p-2 text-xs text-white rounded lg:text-sm' onclick='prestasiDetailDelete(\"{$data->id}\")' style='background-color:red' >Delete</a>";

                return "
                        <div class='flex flex-row '>
                            <button id='btn-teacher' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='window.location.href=\"{$url}\"'>
                                Update
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);;
        return $dataTable->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kesalahan = Kesalahan::where('is_active', 1)->get();
        return view('kesalahan-detail.kesalahanDetailAdd', ['kesalahan' => $kesalahan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KesalahanDetail $kesalahanDetail, Request $request)
    {
        $rules = [
            'txtidstudent' => 'required|numeric',
            'txtname' => 'required|max:255',
            'txtkesalahanId' => 'required|numeric',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'required|max:255'
        ];

        $customeMassages = [
            'txtidstudent.required' => 'Nama siswa tidak valid!!',
            'txtidstudent.numeric' => 'Data siswa tidak terdaftar!!',
            'txtkesalahanId.required' => 'Data harus di isi!!',
            'txtkesalahanId.numeric' => 'Data tidak terdaftar!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $kesalahanDetail = new KesalahanDetail;

        $kesalahanDetail->student_id = $request->txtidstudent;
        $kesalahanDetail->kesalahan_id = $request->txtkesalahanId;
        $kesalahanDetail->tanggal = $request->txttanggal;
        $kesalahanDetail->keterangan = $request->txtketerangan;

        $kesalahanDetail->save();

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KesalahanDetail $kesalahanDetail, $id)
    {
        $data = KesalahanDetail::with('student')->findOrFail($id);
        $kesalahan = Kesalahan::where('is_active', 1)->get();
        try {
            return view('kesalahan-detail.kesalahanDetailUpdate', ['data' => $data, 'kesalahan' => $kesalahan]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // seacrh siswa by name
    public function searchName($name)
    {
        return response()->json(
            Student::where('is_active', 1)
                ->where('is_lulus', 'F')
                ->where('name', 'LIKE', '%' . $name . '%')
                ->get()
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'txtidstudent' => 'required|numeric',
            'txtname' => 'required|max:255',
            'txtkesalahanId' => 'required|numeric',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'required|max:255'
        ];

        $customeMassages = [
            'txtidstudent.required' => 'Nama siswa tidak valid!!',
            'txtidstudent.numeric' => 'Data siswa tidak terdaftar!!',
            'txtkesalahanId.required' => 'Data harus di isi!!',
            'txtkesalahanId.numeric' => 'Data tidak terdaftar!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $kesalahanDetail = KesalahanDetail::findOrFail($id);

        $kesalahanDetail->student_id = $request->txtidstudent;
        $kesalahanDetail->kesalahan_id = $request->txtkesalahanId;
        $kesalahanDetail->tanggal = $request->txttanggal;
        $kesalahanDetail->keterangan = $request->txtketerangan;

        $kesalahanDetail->save();

        return back()->with('msg', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        KesalahanDetail::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'msg' => 'Data berhasil di hapus',
        ]);
    }
}
