<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\KeterlambatanGurus;
use App\Models\Teachers;
use Yajra\DataTables\Facades\DataTables;

class KeterlambatanGurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:keterlambatanguru.list|keterlambatanguru.create|keterlambatanguru.edit|keterlambatanguru.delete'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:keterlambatanguru.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:keterlambatanguru.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:keterlambatanguru.delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('keterlambatan_guru.index');
    }
    // datatables
    public function dataTable()
    {
        $data = KeterlambatanGurus::with('jabatan', 'teacher')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->teacher->name;
            })
            ->addColumn('jabatan', function ($data) {
                return $data->jabatan->name;
            })
            ->addColumn('email', function ($data) {
                return $data->email;
            })
            ->addColumn('tanggal', function ($data) {
                return $data->tanggal;
            })
            ->addColumn('keterangan', function ($data) {
                return $data->keterangan;
            })
            ->addColumn('actions', function ($data) {
                $url = route('keterlambatanguru.edit', $data->id);
                $str = "<a href='#' type='button' id='btn-delete' class='p-2 text-xs text-white rounded lg:text-sm' onclick='keterlambatanDelete(\"{$data->id}\")' style='background-color:red' >Delete</a>";

                return "
                        <div class='flex flex-row '>
                            <button id='btn-keterlambatan' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='window.location.href=\"{$url}\"'>
                                Update
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);;
        return $dataTable->make(true);
    }

    // search by name form 
    public function searchName(KeterlambatanGurus $keterlambatanGurus, Request $request)
    {
        return response()->json(Teachers::with('jabatan')->where('name', 'like', '%' . $request->name . '%')->get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keterlambatan_guru.ketelambatanAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KeterlambatanGurus $keterlambatanGurus, Request $request)
    {
        $teacher = Teachers::findOrFail($request->txtteacherid);
        try {
            //code...
            KeterlambatanGurus::create([
                'teacher_id' => $request->txtteacherid,
                'jab_id' => $request->txtjabatan,
                'tanggal' => $request->txttanggal,
                'keterangan' => $request->txtketerangan,
            ]);
        } catch (\Exception $e) {
            return back()->with('errors', 'data guru tidak terdaftar');
        }

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeterlambatanGurus $keterlambatanGurus, $id)
    {
        $data = KeterlambatanGurus::with('teacher', 'jabatan')->findOrFail($id);
        return view('keterlambatan_guru.keterlambatanEdit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeterlambatanGurus $keterlambatanGurus, $id)
    {
        $teacher = Teachers::findOrFail($request->txtteacherid);
        try {
            //code...
            $keterlambatanGurus = KeterlambatanGurus::findOrFail($id);

            $keterlambatanGurus->teacher_id = $request->txtteacherid;
            $keterlambatanGurus->jab_id = $request->txtjabatan;
            $keterlambatanGurus->tanggal = $request->txttanggal;
            $keterlambatanGurus->keterangan = $request->txtketerangan;
            $keterlambatanGurus->save();
        } catch (\Exception $e) {
            return back()->with('errors', 'data guru tidak terdaftar');
        }

        return back()->with('msg', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        KeterlambatanGurus::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'msg' => 'Data berhasil di hapus!!',
        ]);
    }
}
