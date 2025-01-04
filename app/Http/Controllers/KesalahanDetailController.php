<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Student;
use App\Models\Kesalahan;
use Illuminate\Http\Request;
use App\Models\kesalahanDetail;
use App\Models\Siswa;
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
        $this->middleware(['permission:detailkesalahan-siswa.list'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:detailkesalahan-siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:detailkesalahan-siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:detailkesalahan-siswa.delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $kesalahan = Kesalahan::where('is_active', 1)->get();
        return view('kesalahan-detail.index', compact('kesalahan'));
    }

    public function dataTable()
    {
        $data = kesalahanDetail::with('siswa', 'kesalahan')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function ($data) {
                return $data->siswa->nama;
            })
            ->addColumn('kelas', function ($data) {
                $kelas = json_decode($data->siswa->kelas, true);
                return $kelas['nama'] ?? '-';
            })
            ->addColumn('kesalahan', function ($data) {
                return $data->kesalahan->nama;
            })
            ->addColumn('tanggal', function ($data) {
                return $data->tanggal;
            })
            ->addColumn('keterangan', function ($data) {
                return $data->keterangan;
            })
            ->addColumn('aksi', function ($data) {
                $buttons = [];
                // Tombol edit (jika ada izin)
                if (auth()->user()->hasPermissionTo('detailkesalahan-siswa.edit')) {
                    $editButton = '<button 
                            type="button" 
                            class="p-2 btn btn-clear btn-info btn-edit" 
                            data-id="' . e($data->id) . '">
                            <i class="ki-filled ki-pencil"></i>
                        </button>';
                    $buttons[] = $editButton;
                }

                // Tombol delete (jika ada izin)
                if (auth()->user()->hasPermissionTo('detailkesalahan-siswa.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete" class="btn btn-clear btn-danger"><i class="ki-filled ki-trash"></i></a>';
                    $buttons[] = $deleteButton;
                }

                // Gabungkan semua tombol
                return '<div class="flex flex-row items-center justify-center gap-2">' . implode(' ', $buttons) . '</div>';
            })->rawColumns(['aksi']);
        return $dataTable->make(true);
    }

    public function show()
    {
        // 
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
    public function store(KesalahanDetail $kesalahanDetail, Request $request)
    {
        $rules = [
            'txtidsiswa' => 'required',
            'txtnama' => 'required|max:255',
            'txtkesalahanId' => 'required',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'max:255'
        ];

        $customeMassages = [
            'txtidsiswa.required' => 'Nama siswa tidak valid!!',
            'txtkesalahanId.required' => 'Data harus di isi!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $kesalahanDetail = new KesalahanDetail;

        $kesalahanDetail->siswa_id = $request->txtidsiswa;
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
    public function searchName(Request $request)
    {
        return response()->json(
            Siswa::with('kelas')->where('is_active', 1)
                ->where('is_lulus', 0)
                ->where('nama', 'LIKE', '%' . $request->name . '%')
                ->get()
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KesalahanDetail $kesalahanDetail)
    {
        $rules = [
            'txtidsiswa' => 'required',
            'txtnama' => 'required|max:255',
            'txtkesalahanId' => 'required',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'max:255'
        ];

        $customeMassages = [
            'txtidsiswa.required' => 'Nama siswa tidak valid!!',
            'txtkesalahanId.required' => 'Data harus di isi!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $kesalahanDetail = KesalahanDetail::findOrFail($request->id);

        $kesalahanDetail->siswa_id = $request->txtidsiswa;
        $kesalahanDetail->kesalahan_id = $request->txtkesalahanId;
        $kesalahanDetail->tanggal = $request->txttanggal;
        $kesalahanDetail->keterangan = $request->txtketerangan;

        $kesalahanDetail->save();

        return back()->with('msg', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kesalahanDetail $kesalahanDetail, $id)
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
