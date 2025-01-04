<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Siswa;
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
        $prestasi = Prestasi::where('is_active', '=', '1')->get();
        return view('prestasi-detail.index', compact('prestasi'));
    }

    public function dataTable()
    {
        $data = PrestasiDetail::with('siswa', 'prestasi')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function ($data) {
                return $data->siswa->nama;
            })
            ->addColumn('kelas', function ($data) {
                $kelas = json_decode($data->siswa->kelas, true);
                return $kelas['nama'] ?? '-';
            })
            ->addColumn('prestasi', function ($data) {
                return $data->prestasi->nama;
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
                if (auth()->user()->hasPermissionTo('detailprestasi-siswa.edit')) {
                    $editButton = '<button 
                            type="button" 
                            class="p-2 btn btn-clear btn-info btn-edit" 
                            data-id="' . e($data->id) . '">
                            <i class="ki-filled ki-pencil"></i>
                        </button>';
                    $buttons[] = $editButton;
                }

                // Tombol delete (jika ada izin)
                if (auth()->user()->hasPermissionTo('detailprestasi-siswa.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete" class="btn btn-clear btn-danger"><i class="ki-filled ki-trash"></i></a>';
                    $buttons[] = $deleteButton;
                }

                // Gabungkan semua tombol
                return '<div class="flex flex-row items-center justify-center gap-2">' . implode(' ', $buttons) . '</div>';
            })->rawColumns(['aksi']);
        return $dataTable->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $prestasi = Prestasi::where('is_active', 1)->get();
        // return view('prestasi-detail.prestasiDetailAdd', ['prestasi' => $prestasi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestasiDetail $prestasiDetail, Request $request)
    {
        $rules = [
            'txtidsiswa' => 'required',
            'txtnama' => 'required|max:255',
            'txtprestasiId' => 'required',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'max:255'
        ];

        $customeMassages = [
            'txtidsiswa.required' => 'Nama siswa tidak valid!!',
            'txtprestasiId.required' => 'Data harus di isi!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $kesalahanDetail = new PrestasiDetail();

        $kesalahanDetail->siswa_id = $request->txtidsiswa;
        $kesalahanDetail->prestasi_id = $request->txtprestasiId;
        $kesalahanDetail->tanggal = $request->txttanggal;
        $kesalahanDetail->keterangan = $request->txtketerangan;

        $kesalahanDetail->save();

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
            'txtidsiswa' => 'required',
            'txtnama' => 'required|max:255',
            'txtprestasiId' => 'required',
            'txttanggal' => 'required|date',
            'txtketerangan' => 'max:255'
        ];

        $customeMassages = [
            'txtidsiswa.required' => 'Nama siswa tidak valid!!',
            'txtprestasiId.required' => 'Data harus di isi!!',
            'txttanggal.date' => 'Format data tidak di kenali!!',
            'txtketerangan.max' => 'Maximal 255 character!!',
        ];

        $this->validate($request, $rules, $customeMassages);

        $kesalahanDetail = PrestasiDetail::findOrFail($request->id);

        $kesalahanDetail->siswa_id = $request->txtidsiswa;
        $kesalahanDetail->prestasi_id = $request->txtprestasiId;
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
        PrestasiDetail::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'msg' => 'Data berhasil di hapus',
        ]);
    }

    public function searchName(Request $request)
    {
        return response()->json(
            Siswa::with('kelas')->where('is_active', 1)
                ->where('is_lulus', 0)
                ->where('nama', 'LIKE', '%' . $request->name . '%')
                ->get()
        );
    }
}
