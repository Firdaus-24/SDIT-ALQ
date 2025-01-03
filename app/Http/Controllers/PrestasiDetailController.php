<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Student;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Models\PrestasiDetail;
use Yajra\DataTables\Facades\DataTables;

class PrestasiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:detailprestasi-siswa.list'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:detailprestasi-siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:detailprestasi-siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:detailprestasi-siswa.delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prestasi-detail.index');
    }

    public function dataTable()
    {
        $data = PrestasiDetail::with('student', 'prestasi')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->student->name;
            })
            ->addColumn('kelas', function ($data) {
                return $data->student->kelas;
            })
            ->addColumn('prestasi', function ($data) {
                return $data->prestasi->name;
            })
            ->addColumn('tanggal', function ($data) {
                return $data->tanggal;
            })
            ->addColumn('keterangan', function ($data) {
                return $data->keterangan;
            })
            ->addColumn('actions', function ($data) {
                $url = route('detailprestasi-siswa.edit', $data->id);
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
        $prestasi = Prestasi::where('is_active', 1)->get();
        return view('prestasi-detail.prestasiDetailAdd', ['prestasi' => $prestasi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestasiDetail $prestasiDetail, Request $request)
    {
        $rules = [
            'txtidstudent' => 'required|numeric',
            'txtname' => 'required|max:255',
            'txtprestasiId' => 'required|numeric',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'required|max:255'
        ];

        $customeMassages = [
            'txtidstudent.required' => 'Nama siswa tidak valid!!',
            'txtidstudent.numeric' => 'Data siswa tidak terdaftar!!',
            'txtprestasiId.required' => 'Data harus di isi!!',
            'txtprestasiId.numeric' => 'Data tidak terdaftar!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $prestasiDetail = new PrestasiDetail;

        $prestasiDetail->student_id = $request->txtidstudent;
        $prestasiDetail->prestasi_id = $request->txtprestasiId;
        $prestasiDetail->tanggal = $request->txttanggal;
        $prestasiDetail->keterangan = $request->txtketerangan;

        $prestasiDetail->save();

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrestasiDetail $prestasiDetail, $id)
    {
        $data = PrestasiDetail::with('student')->findOrFail($id);
        $prestasi = Prestasi::where('is_active', 1)->get();
        try {
            return view('prestasi-detail.prestasiDetailUpdate', ['data' => $data, 'prestasi' => $prestasi]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'txtidstudent' => 'required|numeric',
            'txtname' => 'required|max:255',
            'txtprestasiId' => 'required|numeric',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'required|max:255'
        ];

        $customeMassages = [
            'txtidstudent.required' => 'Nama siswa tidak valid!!',
            'txtidstudent.numeric' => 'Data siswa tidak terdaftar!!',
            'txtprestasiId.required' => 'Data harus di isi!!',
            'txtprestasiId.numeric' => 'Data tidak terdaftar!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $prestasiDetail = PrestasiDetail::findOrFail($id);

        $prestasiDetail->student_id = $request->txtidstudent;
        $prestasiDetail->prestasi_id = $request->txtprestasiId;
        $prestasiDetail->tanggal = $request->txttanggal;
        $prestasiDetail->keterangan = $request->txtketerangan;

        $prestasiDetail->save();

        return back()->with('msg', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        PrestasiDetail::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'msg' => 'Data berhasil di hapus',
        ]);
    }

    public function searchName($name)
    {
        return response()->json(
            Student::where('is_active', 1)
                ->where('is_lulus', 'F')
                ->where('name', 'LIKE', '%' . $name . '%')
                ->get()
        );
    }
}
