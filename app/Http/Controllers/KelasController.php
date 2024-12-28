<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Kelas;
use App\Imports\KelasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:kelas.list'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:kelas.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:kelas.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:kelas.delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index');
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
        $request->validate([
            'txtnama' => 'required|max:100|min:2|unique:kelas,nama'
        ]);

        Kelas::create([
            'nama' => $request->txtnama,
            'is_active' => 1
        ]);

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $data = Kelas::findOrFail($request->id);

            // cek jika nama nya sama
            $data->nama = $request->txtnama;
            $data->updated_at = now();

            $data->save();

            return response()->json(['msg' => 'data berhasil dirubah'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas, $id)
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
            $data = Kelas::findOrFail($id);

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

    public function dataTable()
    {
        try {
            $data = Kelas::query()->get();
            $datatables = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($data) {
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
                ->addColumn('aksi', function ($data) {
                    $buttons = [];

                    if (auth()->user()->hasPermissionTo('kelas.edit')) {
                        $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                        <i class="ki-filled ki-pencil"></i>
                                        </button>';
                        $buttons[] = $editButton;
                    }

                    if (auth()->user()->hasPermissionTo('kelas.delete')) {
                        $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"'
                            . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                            . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                            '</a>';
                        $buttons[] = $deleteButton;
                    }

                    return '<div class="flex flex-row items-center justify-center">' . implode(' ', $buttons) . '</div>';
                })
                ->rawColumns(['aksi', 'status']);

            return $datatables->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
