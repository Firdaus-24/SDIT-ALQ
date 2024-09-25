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
        $this->middleware(['permission:kelas.list|kelas.create|kelas.edit|kelas.delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:kelas.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:kelas.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:kelas.delete'], ['only' => ['destroy']]);
        $this->middleware(['permission:kelas.import'], ['only' => ['importFile', 'prosesImport']]);
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
    public function update(string $id,Request $request)
    {
        try {
            $data = Kelas::findOrFail($id);

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
            $data = Kelas::all();
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
                ->addColumn('is_active', function ($data) {
                    return $data->is_active == 1 ? "Active" : "Off";
                })
                ->addColumn('actions', function ($data) {
                    $editButton = '';
                    $deleteButton = '';
                    
                    if (auth()->user()->hasPermissionTo('kelas.edit')) {
                        $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                        <i class="ki-filled ki-pencil"></i>
                                        </button>';
                    }
    
                    if (auth()->user()->hasPermissionTo('kelas.delete')) {
                        $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"' 
                            . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                            . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                            '</a>';
                    }
        
                    return '<div class="flex flex-row">' . $editButton . $deleteButton . '</div>';
                })
                ->rawColumns(['actions']);
        
            return $datatables->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }    

    public function prosesImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            DB::beginTransaction();
            Excel::import(new KelasImport(), $request->file('file'));

            DB::commit();
            return response()->json(['msg' => 'Data berhasil diuplad'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['msg' => $th->getMessage()], 500);
        }
    }
}
