<?php

namespace App\Http\Controllers;

use App\Models\Kesalahan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KesalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:kesalahan-siswa.list'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:kesalahan-siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:kesalahan-siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:kesalahan-siswa.delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kesalahan.index');
    }

    // data table 
    public function dataTable()
    {
        $data = Kesalahan::all();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function ($data) {
                return $data->nama;
            })
            ->addColumn('created_at', function ($data) {
                return $data->created_at;
            })
            ->addColumn('updated_at', function ($data) {
                return $data->updated_at;
            })
            ->addColumn('score', function ($data) {
                return $data->score;
            })
            ->addColumn('is_active', function ($data) {
                $active = ($data->is_active == 1) ? '<span class="badge badge-sm badge-outline badge-success">Active</span>' : '<span class="badge badge-sm badge-outline badge-danger">Deleted</span>';
                return $active;
            })
            ->addColumn('actions', function ($data) {
                $buttons = [];

                if (auth()->user()->hasPermissionTo('kesalahan-siswa.edit')) {
                    $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                        <i class="ki-filled ki-pencil"></i>
                                        </button>';
                    $buttons[] = $editButton;
                }

                if (auth()->user()->hasPermissionTo('kesalahan-siswa.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"'
                        . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                        . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                        '</a>';
                    $buttons[] = $deleteButton;
                }

                return '<div class="flex flex-row items-center justify-center">' . implode(' ', $buttons) . '</div>';
            })->rawColumns(['actions', 'is_active']);

        return $datatables->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kesalahan::create([
            'nama' => $request->txtnama,
            'score' => $request->txtscore,
            'is_active' => 1,
        ]);

        return back()->with('msg', 'data berhasil disimpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kesalahan $kesalahan)
    {
        $request->validate([
            'id' => 'required',
            'txtnama' => 'required|max:100|min:2|unique:prestasis,nama,' . $request->id,
            'txtscore' => 'required|numeric'
        ]);

        try {
            $data = Kesalahan::findOrFail($request->id);

            // cek jika nama nya sama
            $data->nama = $request->txtnama;
            $data->score = $request->txtscore;

            $data->save();

            return back()->with('msg', 'data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('msg', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesalahan $kesalahan, Request $request, $id)
    {
        try {
            // Cari data berdasarkan ID
            $data = Kesalahan::findOrFail($id);

            // Toggle status is_active
            $data->is_active = $data->is_active == 1 ? 0 : 1;
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui.',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ], 500);
        }
    }
}
