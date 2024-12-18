<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Imports\JabatanImport;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;



class JabatanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:jabatan.list|jabatan.create|jabatan.edit|jabatan.delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:jabatan.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:jabatan.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:jabatan.delete'], ['only' => ['destroy']]);
        $this->middleware(['permission:jabatan.import'], ['only' => ['importFile', 'prosesImport']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('jabatan.index');
    }
    public function show(Request $request) {}
    public function create(Request $request) {}

    public function edit($id) {}

    /**
     * Show the form for creating a new resource.
     */
    public function dataTable()
    {
        try {
            $data = Jabatan::all();
            $datatables = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->nama;
                })
                ->addColumn('created_at', function ($data) {
                    return $data->created_at ? $data->created_at->format('Y-m-d H:i:s') : '-';
                })
                ->addColumn('updated_at', function ($data) {
                    return $data->updated_at ? $data->updated_at->format('Y-m-d H:i:s') : '-';
                })
                ->addColumn('status', function ($data) {
                    $active = ($data->is_active == 1) ? '<span class="badge badge-sm badge-outline badge-success">Active</span>' : '<span class="badge badge-sm badge-outline badge-danger">Deleted</span>';
                    return $active;
                })
                ->addColumn('Aksi', function ($data) {
                    $editButton = '';
                    $deleteButton = '';

                    if (auth()->user()->hasPermissionTo('jabatan.edit')) {
                        $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                        <i class="ki-filled ki-pencil"></i>
                                        </button>';
                    }

                    if (auth()->user()->hasPermissionTo('jabatan.delete')) {
                        $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"'
                            . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                            . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                            '</a>';
                    }

                    return '<div class="w-full flex flex-row justify-center items-center">' . $editButton . $deleteButton . '</div>';
                })
                ->rawColumns(['Aksi', 'status']);

            return $datatables->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtnama' => 'required|max:100|min:2|unique:jabatans,nama'
        ]);

        Jabatan::create([
            'nama' => $request->txtnama,
            'is_active' => 1
        ]);

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        try {
            $data = Jabatan::findOrFail($id);

            // cek jika nama nya sama
            $data->nama = $request->txtnama;
            $data->updated_at = now();

            $data->save();

            return response()->json(['msg' => 'data berhasil dirubah'], 200);
        } catch (\Throwable $th) {
            $th = "error euy";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            if (empty($id)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid ID provided.',
                ], 400);
            }

            DB::beginTransaction();

            // Temukan entri berdasarkan ID
            $data = Jabatan::findOrFail($id);

            // Toggle status is_active
            $data->is_active = $data->is_active == 1 ? 0 : 1;
            $data->save();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Status updated successfully.',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while updating the status.',
            ], 500);
        }
    }


    public function importFile()
    {
        return view('jabatan.jabatanImport');
    }

    public function prosesImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            DB::beginTransaction();
            Excel::import(new JabatanImport(), $request->file('file'));

            DB::commit();
            return response()->json(['msg' => 'Data berhasil diuplad'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['msg' => $th->getMessage()], 500);
        }
    }
}
